<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アカウント登録｜Bordeaux</title>
        <?php require_once('blocks/head.php'); ?>
        <script src="js/form.js"></script>
        <script src="js/password.js"></script>
    </head>
    <body>
        <?php require_once('blocks/header.php'); ?>
        <?php
            require_once('lib/user.php');
            $session_user = NULL;
            if (isset($_SESSION['user'])) {
                $session_user = unserialize($_SESSION['user']);
            }
        ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-circle-user"></i>Account</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">アカウント登録</span>
            </h2>
            <div class="account main__content content-w">
                <div class="account--text content-w">
                    <p>すでにアカウントをお持ちの方はこちらのボタンからログインしてください。</p>
                    <p class="btn__outer fx-jc-center"><a class="btn" href="account_login.php"><i class="fa-solid fa-right-to-bracket"></i>ログイン</a></p>
                </div>
                <form action="./account_confirm.php" method="POST" class="account__container" id="js-form">
                    <dl class="account__container--item">
                        <dt class="form-required"><label for="form-username">お名前をご入力してください。（姓と名）</label></dt>
                        <dd>
                            <?php if (isset($session_user)): ?>
                                <input type="text" name="lastName" value="<?php echo $session_user->get_userName()['provide'][0]; ?>" id="form-username" class="form-focus" placeholder="姓" required>
                                <input type="text" name="firstName" value="<?php echo $session_user->get_userName()['provide'][1]; ?>" class="form-focus" placeholder="名" required>
                            <?php else: ?>
                                <input type="text" name="lastName" id="form-username" class="form-focus" placeholder="姓" required>
                                <input type="text" name="firstName" class="form-focus" placeholder="名" required>
                            <?php endif; ?>
                        </dd>
                    </dl>
                    <dl class="account__container--item">
                        <dt class="form-required"><label for="form-tel">電話番号</label></dt>
                        <dd>
                            <?php if (isset($session_user)): ?>
                                <input type="tel" name="firstTel" value="<?php echo $session_user->get_tel()['provide'][0]; ?>" pattern="\d{2,4}" id="form-tel" class="no-spin form-focus js-contact__tel" required>
                                <div><input type="tel" name="middleTel" value="<?php echo $session_user->get_tel()['provide'][1]; ?>" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required></div>
                                <input type="tel" name="lastTel" value="<?php echo $session_user->get_tel()['provide'][2]; ?>" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required>
                            <?php else: ?>
                                <input type="tel" name="firstTel" pattern="\d{2,4}" id="form-tel" class="no-spin form-focus js-contact__tel" required>
                                <div><input type="tel" name="middleTel" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required></div>
                                <input type="tel" name="lastTel" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required>
                            <?php endif; ?>
                        </dd>
                    </dl>
                    <dl class="account__container--item">
                        <dt class="form-required"><label for="form-email">メールアドレスをご入力してください。</label></dt>
                        <dd>
                            <?php if (isset($session_user)): ?>
                                <input type="email" name="mail" value="<?php echo $session_user->get_mailAddress(); ?>" id="form-email" class="form-focus" placeholder="Bordeaux@for.example" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            <?php else: ?>
                                <input type="email" name="mail" id="form-email" class="form-focus" placeholder="Bordeaux@for.example" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            <?php endif; ?>
                        </dd>
                    </dl>
                    <dl class="account__container--item">
                        <dt class="form-required">
                            <label for="form-password">
                                <span class="span-block">次回ログイン時にパスワードが必要となります。</span>
                                パスワードを設定してください。
                            </label>
                        </dt>
                        <dd>
                            <?php if (isset($session_user)): ?>
                                <input type="password" value="<?php echo $session_user->get_password(); ?>" id="form-password" class="form-focus" required>
                            <?php else: ?>
                                <input type="password" id="form-password" class="form-focus" required>
                            <?php endif; ?>
                        </dd>
                    </dl>
                    <dl class="account__container--item">
                        <dt><label for="form-re_password">確認のため再度入力してください。</label></dt>
                        <dd>
                            <?php if (isset($session_user)): ?>
                                <input type="password" name="password" value="<?php echo $session_user->get_password(); ?>" id="form-re_password" class="form-focus" required>
                            <?php else: ?>
                                <input type="password" name="password" id="form-re_password" class="form-focus" required>
                            <?php endif; ?>
                        </dd>
                    </dl>
                    <div class="btn__outer">
                        <input type="submit" id="form-submit" value="アカウントを登録する" class="fa-sr-only">
                        <label for="form-submit" class="btn">
                            <span>
                                <i class="fa-solid fa-plus"></i>
                                <i class="fa-solid fa-circle-user"></i>
                            </span>
                            <span>
                                アカウントを登録する
                            </span>
                        </label>
                    </div>
                </form>
            </div>
        </main>
        <?php require_once('blocks/footer.php'); ?>
    </body>
</html>