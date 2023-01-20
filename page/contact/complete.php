<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>お問い合わせ内容が送信完了｜Bordeaux</title>
        <title></title>
        <?php require_once('../../blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('../../blocks/header.php'); ?>
        <?php
            if (empty($_SESSION['toMail']) && empty($_SESSION['toMeMail'])) {
                header("Location: ./");
            } else {
                require_once('../../lib/mail.php');
                $toMail = unserialize($_SESSION['toMail']);
                $toMeMail = unserialize($_SESSION['toMeMail']);
                $toMail->send();
                $toMeMail->send();

                unset($_SESSION['toMail']);
                unset($_SESSION['toMeMail']);
            }
        ?>
        <main class="main">
            <h2 class="main--title main--title_contact">
                <span class="span-block"><i class="fa-sharp fa-solid fa-paper-plane"></i>Complete</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">送信完了</span>
            </h2>
            <div class="complete__container content-w">
                <div class="complete__container--inner">
                    <p>お問い合わせしてくださりありがとうございました。控えのメールを自動送信でお送りいたしましたのでご確認ください。</p>
                    <p>こちらでお問い合わせ内容を確認でき次第早めに返信させていただきますので今しばらくお待ちください。</p>
                    <p>下記のリンクからトップページにお戻りになれますのでクリックしてください。</p>
                    <p>※メールが確認できない場合、迷惑メールに受信している可能性がございますので、そちらの方をご確認いただけると幸いです。</p>
                    <p><a href="<?php echo $root->get_file(''); ?>">トップページに戻る</a></p>
                </div>
            </div>

        </main>
        <?php require_once('../../blocks/footer.php'); ?>
    </body>
</html>