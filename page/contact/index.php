<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>お問い合わせ｜Bordeaux</title>
        <?php require_once('../../blocks/head.php'); ?>
        <script src="<?php echo $js->get_file('form.js'); ?>"></script>
    </head>
    <body>
        <?php require_once('../../blocks/header.php'); ?>
        <?php
            require_once('../../lib/mail.php');
            $toMail = NULL;
            if (isset($_SESSION['toMail'])) {
                $toMail = unserialize($_SESSION['toMail']);
            }
        ?>
        <main class="main">
            <h2 class="main--title main--title_contact">
                <span class="span-block"><i class="fa-sharp fa-solid fa-paper-plane"></i>Contact</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">お問い合わせ</span>
            </h2>
            <div class="contact main__content content-w">
                <div class="contact--text">
                    <p>お問い合わせをご希望の方はこちらの入力フォームに必要事項をご記入のうえ、『送信する』ボタンを押してください。</p>
                    <p>自動処理で控えの返信メールをお送りいたします。</p>
                    <p>後ほど、確認でき次第なるべく早く、メールまたはお電話で折り返しご連絡させて頂きます。</p>
                    <p>※メールか、お電話のいずれかをご希望される際は、お問い合わせ内容にその旨をご記入ください。</p>
                </div>
                <form action="./confirm.php" method="POST" class="contact__container">
                    <ul class="contact__container--contact-table">
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt><label for="form-subject">ご用件</label></dt>
                                <dd>
                                    <label for="form-subject">
                                        <select name="subject" id="form-subject" class="form-focus">
                                            <?php $i = 0; ?>
                                            <?php while ($i < count(ToMail::SUBJECTS)): ?>
                                                <?php if (isset($toMail) && $toMail->get_subject() === ToMail::SUBJECTS[$i]) :?>
                                                    <option value="<?php echo $i; ?>" selected><?php echo ToMail::SUBJECTS[$i]; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $i; ?>"><?php echo ToMail::SUBJECTS[$i]; ?></option>
                                                <?php endif; ?>
                                                <?php $i++; ?>
                                            <?php endwhile; ?>
                                        </select>
                                    </label>
                                </dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required"><label for="form-username">お名前</label></dt>
                                <dd>
                                    <?php if (isset($toMail)): ?>
                                        <input type="text" name="lastName" value="<?php echo $toMail->get_provide_name()[0]; ?>" id="form-username" class="form-focus" placeholder="姓" required>
                                        <input type="text" name="firstName" value="<?php echo $toMail->get_provide_name()[1]; ?>" class="form-focus" placeholder="名" required>
                                    <?php elseif (Login::is_login()): ?>
                                        <?php echo $user->get_userName()['full']; ?>
                                        <input type="hidden" name="lastName" value="<?php echo $user->get_userName()['provide'][0]; ?>"required>
                                        <input type="hidden" name="firstName" value="<?php echo $user->get_userName()['provide'][1]; ?>"required>
                                    <?php else: ?>
                                        <input type="text" name="lastName" id="form-username" class="form-focus" placeholder="姓" required>
                                        <input type="text" name="firstName" class="form-focus" placeholder="名" required>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required"><label for="form-tel">電話番号</label></dt>
                                <dd>
                                    <?php if (isset($toMail)): ?>
                                        <input type="tel" name="firstTel" value="<?php echo $toMail->get_provide_tel()[0]; ?>" pattern="\d{2,4}" id="form-tel" class="no-spin form-focus js-contact__tel" required>
                                        <div><input type="tel" name="middleTel" value="<?php echo $toMail->get_provide_tel()[1]; ?>" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required></div>
                                        <input type="tel" name="lastTel" value="<?php echo $toMail->get_provide_tel()[2]; ?>" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required>
                                    <?php else: ?>
                                        <input type="tel" name="firstTel" pattern="\d{2,4}" id="form-tel" class="no-spin form-focus js-contact__tel" required>
                                        <div><input type="tel" name="middleTel" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required></div>
                                        <input type="tel" name="lastTel" pattern="\d{2,4}" class="no-spin form-focus js-contact__tel" required>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required"><label for="form-email">メールアドレス</label></dt>
                                <dd>
                                    <?php if (isset($toMail)): ?>
                                        <input type="email" name="mail" value="<?php echo $toMail->get_mail(); ?>" id="form-email" class="form-focus" placeholder="Bordeaux@for.example" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    <?php else: ?>
                                        <input type="email" name="mail" id="form-email" class="form-focus" placeholder="Bordeaux@for.example" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required"><label for="form-contact_content">お問い合わせ内容</label></dt>
                                <dd>
                                    <?php if (isset($toMail)): ?>
                                        <textarea name="contactMsg"id="form-contact_content" class="form-focus" required><?php echo $toMail->get_msg(); ?></textarea>
                                    <?php else: ?>
                                        <textarea name="contactMsg" id="form-contact_content" class="form-focus" required></textarea>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                    <div class="btn__outer">
                        <input type="submit" id="form-submit" value="送信" class="fa-sr-only">
                        <label for="form-submit" class="btn"><i class="fa-sharp fa-solid fa-paper-plane"></i>送信する</label>
                    </div>
                </form>
            </div>
        </main>
        <?php require_once('../../../../blocks/footer.php'); ?>
    </body>
</html>