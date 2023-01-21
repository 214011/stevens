<?php if (empty($_POST)): ?>
    <?php header("Location: ./"); ?>
<?php else: ?>
    <?php require_once('../../../module/utility_functions.php'); ?>
    <!DOCTYPE html>
    <html lang="ja">
        <head>
            <title>アカウント登録の内容を確認｜Bordeaux</title>
            <?php get_head(); ?>
        </head>
        <body>
            <?php get_header(); ?>
            <?php
                get_class_user();
                $user = new User(
                    ['firstName' => $_POST['firstName'],'lastName' => $_POST['lastName']],
                    ['firstTel' => $_POST['firstTel'], 'middleTel' => $_POST['middleTel'], 'lastTel' => $_POST['lastTel']],
                    $_POST['mail'],
                    $_POST['password']
                );
                $_SESSION['user'] = serialize($user);
            ?>
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
                            <dd><?php echo User::to_hidden_password($user->get_password()); ?></dd>
                        </dl>
                        <div class="btn__outer account--confirm">
                            <p><a href="./" class="btn btn--cancel"><i class="fa-solid fa-pencil"></i>修正する</a></p>
                            <p>
                                <a href="process.php" class="btn">
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
            <?php get_footer(); ?>
        </body>
    </html>
<?php endif; ?>