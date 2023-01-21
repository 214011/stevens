<?php
    require_once('../../../module/utility_functions.php');
    $root = new URL();
    $account_login = new URL(['page', 'account', 'login']);
    session_start();
    get_class_login();
    get_class_url();
    if (Login::is_login()) {
        setcookie(
            'user',
            '',
            [
                'expires' => time() - 60,
                'path' => '/stevens'
            ]
        );
        Login::logout();
        header('Location: ' . $root->get_file(''));
    } else {
        header('Location: ' . $account_login->get_file(''));
    }
?>