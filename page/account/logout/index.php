<?php require_once('../../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ログアウト｜Bordeaux</title>
        <?php get_head(); ?>
    </head>
    <body>
        <?php get_header(); ?>
        <?php
            get_class_user();
            $session_user = NULL;
            if (isset($_SESSION['user'])) {
                $session_user = unserialize($_SESSION['user']);
            }
        ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-circle-user"></i>Logout</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">ログアウト</span>
            </h2>
            <div class="account main__content content-w">
                <div class="account--text content-w">
                    <p>ログアウトしますか？</p>
                    <p class="btn__outer fx-jc-center"><a class="btn" href="process.php"><i class="fa-solid fa-right-from-bracket"></i></i>ログアウト</a></p>
                </div>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>