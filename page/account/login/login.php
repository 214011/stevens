<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ログイン｜Bordeaux</title>
        <?php require_once('blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('../../blocks/header.php''); ?>
        <main class="main">
            <h2 class="main--title main--title_account">
                <span class="span-block"><i class="fa-solid fa-right-to-bracket"></i>Login</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">ログイン</span>
            </h2>
            <div class="account main__content content-w">
                <form action="./account_login_process.php" method="POST" class="account-login__container">
                    <dl class="account-login__container--item">
                        <dt><label for="form-email">メールアドレス</label></dt>
                        <dd><input type="email" name="mailAddress" id="form-email" class="form-focus" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></dd>
                    </dl>
                    <dl class="account-login__container--item">
                        <dt>
                            <label for="form-password">パスワード</label>
                        </dt>
                        <dd><input type="password" name="password" id="form-password" class="form-focus" required></dd>
                    </dl>
                    <div class="btn__outer">
                        <input type="submit" id="form-submit" value="ログイン" class="fa-sr-only">
                        <label for="form-submit" class="btn"><i class="fa-solid fa-right-to-bracket"></i>ログイン</label>
                    </div>
                </form>
            </div>
        </main>
        <?php require_once('../../blocks/footer.php'); ?>
    </body>
</html>