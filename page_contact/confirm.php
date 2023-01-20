<?php if (empty($_POST)): ?>
    <?php header("Location: ./contact.php"); ?>
<?php else: ?>
<?php
    require_once('lib/mail.php');

    $toMail = new ToMail(
        (int)$_POST['subject'],
        [
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName']
        ],
        $_POST['mail'],
        [
            'firstTel' => $_POST['firstTel'],
            'middleTel' => $_POST['middleTel'],
            'lastTel' => $_POST['lastTel'],
        ],
        $_POST['contactMsg']
    );

    $toMeMail = new ToMeMail(
        (int)$_POST['subject'],
        [
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName']
        ],
        $_POST['mail'],
        [
            'firstTel' => $_POST['firstTel'],
            'middleTel' => $_POST['middleTel'],
            'lastTel' => $_POST['lastTel'],
        ],
        $_POST['contactMsg']
    );
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>お問い合わせ内容を確認｜Bordeaux</title>
        <title></title>
        <?php require_once('blocks/head.php'); ?>
    </head>
    <body>
        <?php require_once('blocks/header.php'); ?>
        <?php
            $_SESSION['toMail'] = serialize($toMail);
            $_SESSION['toMeMail'] = serialize($toMeMail);
        ?>
        <main class="main">
            <h2 class="main--title main--title_contact">
                <span class="span-block"><i class="fa-sharp fa-solid fa-paper-plane"></i>Confirm</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">内容確認</span>
            </h2>
            <div class="contact confirm main__content content-w">
                <div class="contact__container">
                    <ul class="contact__container--contact-table">
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt>ご用件</dt>
                                <dd><?php echo $toMail->get_subject(); ?></dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required">お名前</dt>
                                <dd><?php echo $toMail->get_full_name(); ?></dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required">電話番号</dt>
                                <dd><?php echo $toMail->get_full_tel(); ?></dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required">メールアドレス</dt>
                                <dd><?php echo $toMail->get_mail(); ?></dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required">お問い合わせ内容</dt>
                                <dd><p><?php echo $toMail->get_bind_msg(); ?></p></dd>
                            </dl>
                        </li>
                    </ul>
                    <div class="btn__outer">
                        <p><a href="./contact.php" class="btn btn--cancel"><i class="fa-solid fa-pencil"></i>修正する</a></p>
                        <p><a href="./complete.php" class="btn"><i class="fa-sharp fa-solid fa-paper-plane"></i>送信する</a></p>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once('blocks/footer.php'); ?>
    </body>
</html>
<?php endif; ?>