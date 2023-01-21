<?php require_once('../../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント登録が完了しました｜Bordeaux</title>
        <?php get_head(); ?>
    </head>
    <body>
        <?php get_header(); ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-circle-user"></i>Success</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">登録できました</span>
            </h2>
            <div class="account--success main__content content-w">
                <p>アカウントの登録ができました！さっそく予約をとってみましょう！</p>
                <p>予約は下のリンクからできます。</p>
                <p><a href="<?php echo reserve->get_file(''); ?>">予約をとる</a></p>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>