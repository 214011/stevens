<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント登録ができませんした｜Bordeaux</title>
        <?php require_once('../../../blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('../../../blocks/header.php'); ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-circle-user"></i>Failed</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">登録失敗</span>
            </h2>
            <div class="account--success main__content content-w">
                <p>ご入力のメールアドレスはすでに登録済みのためアカウントの登録が完了しませんでした。</p>
                <p>ログインにお困りなら、お問い合わせで何なりとお申し付けください。</p>
                <p><a href="<?php echo $contact->get_file(''); ?>">ログインについて問い合わせる</a></p>
            </div>
        </main>
        <?php require_once('../../../blocks/footer.php'); ?>
    </body>
</html>