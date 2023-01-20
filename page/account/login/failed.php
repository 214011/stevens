<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ログイン失敗｜Bordeaux</title>
        <?php require_once('blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('../../blocks/header.php''); ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-right-from-bracket"></i>Failed</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">ログイン失敗</span>
            </h2>
            <div class="account main__content content-w">
                <div class="account--text content-w">
                    <p>申し訳ございません。メールアドレスかパスワードが間違っていたためログインできませんでした。</p>
                    <p>再度ログインするには下のボタンからログインしてください。</p>
                    <p class="btn__outer fx-jc-center"><a class="btn" href="account_login.php"><i class="fa-solid fa-right-to-bracket"></i>ログイン</a></p>
                </div>
            </div>
        </main>
        <?php require_once('../../blocks/footer.php'); ?>
    </body>
</html>