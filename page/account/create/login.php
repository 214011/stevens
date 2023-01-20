<?php
    session_start();
    require_once('../../../lib/user.php');
    require_once('../../../lib/login.php');
    $user = unserialize($_COOKIE['user']);
    $login = new Login($user->get_mailAddress(), $user->get_mailAddress(), $_GET['origin_pswd'], $user->get_password());
    if ($login->is_pass()) {
        $login->setInsertMode(Login::SET_INSERT_DICTIONARY_MODE);
        $login->insert_login_session();
        header("Location: ./success.php");
    }