<?php
    require_once('../../module/utility_functions.php');
    get_class_login();
    get_class_url();

    $reserve = new URL(['page', 'reserve']);

    session_start();
    if (!Login::is_login()) {
        header('Location: ' . $reserve->get_file('reason_no-account.php'));
    } else {
        if (empty($_GET['datetime'])) {
            header('Location: ./');
        } else {
            try {
                $date = new DateTime($_GET['datetime']);
            } catch (Exception $e) {
                header('Location: ./');
            }

            get_module_get_db_user();
            get_module_search_reserver();
            get_class_user();
            $user = unserialize($_COOKIE['user']);
            $dbh = get_module_dbh_instance();

            $reserver_limit = 4;

            // 人数制限4人以上になったら予約失敗ページに飛ばす
            if (search_reserver($dbh, $date->format('Y-m-d H:i:s')) >= $reserver_limit) {
                header('Location: ' . $reserve->get_file('reason_limit.php'));
            } else {
                // 予約日をアップデート
                $stmt = $dbh->query__UPDATE([
                    DBH::SQL__SET => [
                        ['reserve_datetime' => ':reserve_datetime']
                    ],
                    DBH::SQL__WHERE => ['id' => ':id']
                ]);
                $dbh->bindValue($stmt,[
                    [':reserve_datetime', $date->format('Y-m-d H:i:s'), PDO::PARAM_STR],
                    [':id', $user->get_id(), PDO::PARAM_INT]
                ]);
                $stmt->execute();

                // 予約日をブラウザ側のユーザ情報にセット
                $row = get_db_user($dbh, $user->get_mailAddress());
                $user->set_reserveDatetime($row->reserve_datetime);
                $user->set_modified($row->modified);

                setcookie(
                    'user',
                    '',
                    [
                        'expires' => time() - 60,
                        'path' => '/stevens'
                    ]
                );

                setcookie(
                    'user',
                    serialize($user),
                    [
                        'expires' => time() + (10 * 365 * 24 * 60 * 60),
                        'path' => '/stevens'
                    ]
                );

                header('Location: ' . $reserve->get_file('complete.php'));
            }
        }
    }
?>