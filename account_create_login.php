<?php
    session_start();
    require_once('module/user.php');
    require_once('module/login.php');
    $user = unserialize($_COOKIE['user']);
    $login = new Login($user->get_mailAddress(), $_GET['origin_pswd']);
    header("Location: ./account_success.php");
?>