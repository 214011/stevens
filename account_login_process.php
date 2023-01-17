<?php
    session_start();
    require_once('module/dbh_instance.php');
    require_once('module/login.php');
    require_once('module/user.php');
    if (isset($_POST['mailAddress']) && isset($_POST['password'])) {

        $stmt = $dbh->query__SELECT([
            DBH::SQL__SELECT => '*',
            DBH::SQL__WHERE => [
                ['mail' => ':mail']
            ],
            DBH::SQL__LIMIT => 1
        ]);
        $dbh->bindValue($stmt,[
            [':mail', $_POST['mailAddress'], PDO::PARAM_STR]
        ]);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if ($row) {

            setcookie(
                'user',
                '',
                time() - 60
            );

            $login = new Login($row->mail, $_POST['mailAddress'], $_POST['password'], $row->pswd);
            if ($login->is_pass()) {
                $array_userName = explode('　', $row->username);
                $array_tel = explode('-', $row->tel);

                $user = new User(
                    ['firstName' => $array_userName[1],'lastName' => $array_userName[0]],
                    ['firstTel' => $array_tel[0], 'middleTel' => $array_tel[1], 'lastTel' => $array_tel[2]],
                    $_POST['mailAddress'],
                    $_POST['password']
                );
                $user->set_id($row->id);
                $user->set_reserveDatetime($row->reserve_datetime);
                $user->set_created($row->created);
                $user->set_modified($row->modified);

                setcookie(
                    'user',
                    serialize($user),
                    time() + (10 * 365 * 24 * 60 * 60)
                );

                $login->setInsertMode(Login::SET_INSERT_DICTIONARY_MODE);
                $login->insert_login_session();
                header("Location: ./");
            } else {
                header("Location: ./account_login_failed.php");
            }
        } else {
            setcookie(
                'user',
                '',
                time() - 60
            );
            Login::logout();
            header("Location: ./account_login_failed.php");
        }
    } else {
        header('Location: ./');
    }
?>