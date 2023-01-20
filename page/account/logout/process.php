<?php
    session_start();
    require_once('../../../lib/login.php');
    require_once('../../../lib/url.php');
    URL::$DIR = 'stevens';
    $root = new URL();
    $account_login = new URL(['page', 'account', 'login']);
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