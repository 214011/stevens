<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>予約失敗｜Bordeaux</title>
        <?php get_head(); ?>
        <?php get_class_url(); ?>
    </head>
    <body>
        <?php get_header(); ?>
        <main class="main">
            <h2 class="main--title main--title_reserve">
                <span class="span-block"><i class="fa-regular fa-calendar-days"></i>Failed</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">ログインもしくはアカウントを作成してください</span>
            </h2>
            <div class="account account--success main__content content-w">
                <div class="account--text content-w">
                    <p>ログインかアカウント登録がされていないため、予約ができません</p>
                    <p>下記のリンクからアカウントをログイン・作成してください</p>
                    <?php $account_create = new URL(['page', 'account', 'create']); ?>
                    <p><a href="<?php echo $account_create->get_file(''); ?>">アカウント関連ページへ</a></p>
                </div>
            </div>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>