<?php if (empty($_POST)): ?>
    <?php header("Location: ./account.php"); ?>
<?php else: ?>
<?php
    require_once('module/user.php');
    session_start();
    $user = new User(
        ['firstName' => $_POST['firstName'],'lastName' => $_POST['lastName']],
        ['firstTel' => $_POST['firstTel'], 'middleTel' => $_POST['middleTel'], 'lastTel' => $_POST['lastTel']],
        $_POST['mail'],
        $_POST['password']
    );
    $_SESSION['user'] = serialize($user);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント登録の内容を確認｜Bordeaux</title>
        <?php require_once('blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('blocks/header.php'); ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-circle-user"></i>Confirm</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">登録内容確認</span>
            </h2>
            <div class="account main__content content-w">
                <div class="account__container">
                    <dl class="account--confirm__container--item">
                        <dt>お名前</dt>
                        <dd><?php echo $user->get_userName()['full']; ?></dd>
                    </dl>
                    <dl class="account--confirm__container--item">
                        <dt>電話番号</dt>
                        <dd><?php echo $user->get_tel()['full']; ?></dd>
                    </dl>
                    <dl class="account--confirm__container--item">
                        <dt>メールアドレス</dt>
                        <dd><?php echo $user->get_mailAddress(); ?></dd>
                    </dl>
                    <dl class="account--confirm__container--item">
                        <dt>パスワード</dt>
                        <dd>
                            <?php
                                $pswd = $user->get_password();
                                $i = 0;
                                while ($i < count(str_split($pswd))) {
                                    if($i === 0 || $i === (count(str_split($pswd)) - 1)) {
                                        echo $pswd[$i];
                                    } else {
                                        echo '＊';
                                    }
                                    $i++;
                                }
                            ?>
                            </dd>
                    </dl>
                    <div class="btn__outer account--confirm">
                        <p><a href="./account.php" class="btn btn--cancel"><i class="fa-solid fa-pencil"></i>修正する</a></p>
                        <p>
                            <a href="account_create.php" class="btn">
                                <span>
                                    <i class="fa-solid fa-plus"></i>
                                    <i class="fa-solid fa-circle-user"></i>
                                </span>
                                <span>
                                    アカウントを登録する
                                </span>
                            </a>
                        </p>
                        </div>
                </div>
            </div>
        </main>
        <?php require_once('blocks/footer.php'); ?>
    </body>
</html>
<?php endif; ?>