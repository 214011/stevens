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
            <h2 class="main--title main--title_reserve">
                <span class="span-block"><i class="fa-regular fa-calendar-days"></i>Failed</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">予約失敗</span>
            </h2>
            <div class="account account--success main__content content-w">
                <div class="account--text content-w">
                    <p>申し訳ございません。あなたより先に予約が入ってしまったようです。</p>
                    <p>誠に勝手ながら別日で予約をお取りくださるようよろしくお願いします。</p>
                    <p>下のリンクから予約ができます。</p>
                    <?php $reserve = new URL(['page', 'reserve']); ?>
                    <p><a href="<?php echo $reserve->get_file(''); ?>">別日で予約をする</a></p>
                </div>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>