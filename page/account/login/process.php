<?php
    session_start();
    require_once('../../../module/dbh_instance.php');
    require_once('../../../lib/login.php');
    require_once('../../../lib/url.php');
    require_once('../../../lib/user.php');
    if (isset($_POST['mailAddress']) && isset($_POST['password'])) {

        require_once('../../../module/get_user.php');
        $row = get_db_user($dbh, $_POST['mailAddress']);

        if ($row) {

            setcookie(
                'user',
                '',
                [
                    'expires' => time() - 60,
                    'path' => '/stevens'
                ]
            );

            $login = new Login($_POST['mailAddress'], $row->mail, $_POST['password'], $row->pswd);

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
                    [
                        'expires' => time() + (10 * 365 * 24 * 60 * 60),
                        'path' => '/stevens'
                    ]
                );

                $login->setInsertMode(Login::SET_INSERT_DICTIONARY_MODE);
                $login->insert_login_session();
                URL::$DIR = 'stevens';
                $root = new URL();
                header("Location: " . $root->get_file(''));
            } else {
                header("Location: ./failed.php");
            }
        } else {
            setcookie(
                'user',
                '',
                [
                    'expires' => time() - 60,
                    'path' => '/stevens'
                ]
            );
            Login::logout();
            header("Location: ./failed.php");
        }
    } else {
        header('Location: ./');
    }