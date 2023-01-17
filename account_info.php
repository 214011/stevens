<?php require_once('module/login.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント情報｜Bordeaux</title>
        <?php require_once('blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('blocks/header.php'); ?>
        <?php if (Login::is_login()): ?>
            <main class="main">
                <h2 class="main--title main--title_account">
                    <span class="span-block"><i class="fa-solid fa-circle-user"></i>Account</span>
                    <span class="fa-sr-only">-</span>
                    <span class="span-block">アカウント情報</span>
                </h2>
                <div class="account main__content content-w">
                    <ul class="account__info">
                        <li class="account__info--row">
                            <dl>
                                <dt>お名前</dt>
                                <dd><?php echo $user->get_userName()['full']; ?></dd>
                            </dl>
                        </li>
                        <li class="account__info--row">
                            <dl>
                                <dt>電話番号</dt>
                                <dd><?php echo $user->get_tel()['full']; ?></dd>
                            </dl>
                        </li>
                        <li class="account__info--row">
                            <dl>
                                <dt>メールアドレス</dt>
                                <dd><?php echo $user->get_mailAddress(); ?></dd>
                            </dl>
                        </li>
                        <li class="account__info--row">
                            <dl>
                                <dt>パスワード</dt>
                                <dd><?php echo User::to_hidden_password($_SESSION['login']['password']); ?></dd>
                            </dl>
                        </li>
                        <li class="account__info--row">
                            <dl>
                                <dt>予約日</dt>
                                <dd>
                                    <?php if ($user->get_reserveDatetime()): ?>
                                        <?php echo $user->get_reserveDatetime(); ?>
                                    <?php else: ?>
                                        <?php echo '現在予約している日はありません'; ?>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </li>
                        <li class="account__info--row">
                            <dl>
                                <dt>更新日</dt>
                                <dd><?php echo $user->get_modified(); ?></dd>
                            </dl>
                        </li>
                        <li class="account__info--row">
                            <dl>
                                <dt>作成日</dt>
                                <dd><?php echo $user->get_created(); ?></dd>
                            </dl>
                        </li>
                    </ul>
                    <p class="btn__outer fx-jc-center"><a class="btn" href="account_logout_process.php"><i class="fa-solid fa-right-from-bracket"></i></i>ログアウト</a></p>
                </div>
            </main>
        <?php else: ?>
            <?php header('Location: ./'); ?>
        <?php endif; ?>
        <?php require_once('blocks/footer.php'); ?>
    </body>
</html>