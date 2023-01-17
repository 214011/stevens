<?php
    session_start();
    require_once('module/login.php');
    if (Login::is_login()) {
        Login::logout();
        header('Location: ./');
    } else {
        header('Location: ./account_login.php');
    }
?>