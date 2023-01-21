<?php
    require_once('../../../module/utility_functions.php');
    session_start();
    get_class_user();
    get_class_login();
    $user = unserialize($_COOKIE['user']);
    $login = new Login($user->get_mailAddress(), $user->get_mailAddress(), $_GET['origin_pswd'], $user->get_password());
    if ($login->is_pass()) {
        $login->setInsertMode(Login::SET_INSERT_DICTIONARY_MODE);
        $login->insert_login_session();
        header("Location: ./success.php");
    }