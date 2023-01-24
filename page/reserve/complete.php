<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>予約ができました｜Bordeaux</title>
        <?php get_head(); ?>
    </head>
    <body>
        <?php get_header(); ?>
        <main class="main">
            <h2 class="main--title main--title_reserve">
                <span class="span-block"><i class="fa-regular fa-calendar-days"></i>Complete</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">予約完了</span>
            </h2>
            <div class="account account--success main__content content-w">
                <div class="account--text content-w">
                    <p>予約が完了しました。控えのメールをお送りしたのでご確認ください。</p>
                    <p>トップページにお戻りなる場合は下のリンクをクリックしてください。</p>
                    <?php $root = new URL(); ?>
                    <p><a href="<?php echo $root->get_file(''); ?>">トップページに戻る</a></p>
                </div>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>