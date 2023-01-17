<?php
    session_start();
    require_once('module/login.php');
    require_once('module/user.php');
    if (isset($_POST['mailAddress']) && isset($_POST['password']) && isset($_COOKIE['user'])) {
        $user = unserialize($_COOKIE['user']);
        $login = new Login($_POST['mailAddress'], $user->get_mailAddress(), $_POST['password'], $user->get_password());
        if ($login->is_pass()) {
            $login->setInsertMode(Login::SET_INSERT_DICTIONARY_MODE);
            $login->insert_login_session();
            header("Location: ./");
        } else {
            header("Location: ./account_login_failed.php");
        }
    } else {
        header('Location: ./');
    }
?>