<?php session_start(); ?>
<?php if (empty($_SESSION['user'])): ?>
    <?php header("Location: ./account.php");  ?>
<?php else: ?>
<?php
    require_once('module/user.php');
    $user = unserialize($_SESSION['user']);
    setcookie(
        'user',
        serialize($user),
        time() + (10 * 365 * 24 * 60 * 60)
    );
    unset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント登録が完了しました｜Bordeaux</title>
        <?php require_once('blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('blocks/header.php'); ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-circle-user"></i>Success</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">登録できました</span>
            </h2>
            <div class="account--success main__content content-w">
                <p>アカウントの登録ができました！さっそく予約をとってみましょう！</p>
                <p>予約は下のリンクからできます。</p>
                <p><a href="./reserve.html">予約をとる</a></p>
            </div>
        </main>
        <?php require_once('blocks/footer.php'); ?>
    </body>
</html>
<?php endif; ?>