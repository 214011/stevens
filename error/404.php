<?php require_once(__DIR__ . '/../module/utility_functions.php'); ?>
<?php
    $root = new URL();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>404 Not Found</title>
        <?php get_head(); ?>
    </head>
    <body>
        <?php get_header(); ?>
        <main>
            <div class="error content-w">
                <h1>
                    <span class="error--alert-icon span-block"><i class="fa-solid fa-triangle-exclamation"></i></span>
                    <span class="media__span-block">404</span> <span class="media__span-block">Not</span> <span class="media__span-block">Found</span>
                </h1>
                <p><span class="error-accent">このページは変更、移動または削除されているか、現在ご利用が出来ない</span>可能性がございます。</p>
                <p>お手数をおかけしますが、</p>
                <p>下のボタンか上部のナビゲーションよりお探しをしていただきますようよろしくお願いいたします。</p>
                <p class="btn__outer"><a class="btn" href="<?php echo $root->get_file(''); ?>">トップページに戻る</a></p>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>