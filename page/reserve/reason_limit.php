<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>予約ができませんでした｜Bordeaux</title>
        <?php get_head(); ?>
    </head>
    <body>
        <?php get_header(); ?>
        <main class="main">
            <div class="reserve--text content-w">
                <p>申し訳ございません。あなたより先に予約が入ってしまったようです。</p>
                <p>誠に勝手ながら別日で予約をお取りくださるようよろしくお願いします。</p>
                <p>下のリンクから予約ができます。</p>
                <p style="margin: 1em;"><a href="./">別日で予約をする</a></p>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>