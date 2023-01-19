<?php
    session_start();
    if (empty($_SESSION['user'])) {
        header("Location: ./account.php");
    } else {
        require_once('module/user.php');
        require_once('module/dbh_instance.php');

        $user = unserialize($_SESSION['user']);

        require_once('module/get_user.php');
        $row = get_user($dbh, $user->get_mailAddress());


        unset($_SESSION['user']);
        if ($row) {
            header("Location: ./account_failed.php");
        } else {

            mb_language('Ja') ;
            mb_internal_encoding('UTF-8') ;
            date_default_timezone_set('Asia/Tokyo');

            $stmt = $dbh->query__INSERT_INTO([
                DBH::SQL__SET => [
                    ['username' => ':username'],
                    ['tel' => ':tel'],
                    ['mail' => ':mail'],
                    ['pswd' => ':pswd'],
                    ['created' => 'NOW()']
                ]
            ]);
            $dbh->bindValue($stmt,[
                [':username', $user->get_userName()['full'], PDO::PARAM_STR],
                [':tel', $user->get_tel()['full'], PDO::PARAM_STR],
                [':mail', $user->get_mailAddress(), PDO::PARAM_STR],
                [':pswd', password_hash($user->get_password(), PASSWORD_DEFAULT), PDO::PARAM_STR]
            ]);
            $stmt->execute();


            $origin_pswd = $user->get_password();

            $stmt = $dbh->query__SELECT([
                DBH::SQL__SELECT => '*',
                DBH::SQL__ORDER_BY => ['id' => DBH::SQL__ORDER_BY_DESC],
                DBH::SQL__LIMIT => 1
            ]);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $user->set_id($row->id);
                $user->set_password($row->pswd);
                $user->set_reserveDatetime($row->reserve_datetime);
                $user->set_created($row->created);
                $user->set_modified($row->modified);
            }

            setcookie('user', '', time() - 60);

            setcookie('user',serialize($user), time() + (10 * 365 * 24 * 60 * 60));

            header('Location: ./account_create_login.php?origin_pswd='. $origin_pswd);
        }
    }
?>