<?php
    require_once('module/mail.php');
    session_start();
    $toMail;
    if (isset($_SESSION['toMail'])) {
        $toMail = unserialize($_SESSION['toMail']);
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="favicon.ico">
        <meta name="robots" content="none">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bordeaux</title>
        <link rel="stylesheet" href="css/base.css">
        <script>
            (function(d) {
                var config = {
                    kitId: 'scj6ipp',
                    scriptTimeout: 3000,
                    async: true
                },
                h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
            })(document);
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/style.css">
        <script src="js/main.js"></script>
        <script src="js/form.js"></script>
    </head>
    <body>
        <header class="header js-hamburger__hook">
            <div class="content-w">
                <h1 class="header--title"><a href="./"><img src="images/header_logo.svg" alt="Bordeaux" width="142" height="50"></a></h1>
                <button type="button" class="hamburger-menu" id="js-hamburger__trigger">
                    <span class="hamburger-menu--graph"></span>
                    <span class="hamburger-menu--graph"></span>
                    <span class="hamburger-menu--graph"></span>
                    <span class="hamburger-menu--text">MENU</span>
                </button>
                <nav class="gnav js-hamburger__hook">
                    <ul class="gnav__container">
                        <li class="gnav__container--item"><a class="js-gnav" href="menu.html">MenuList</a></li>
                        <li class="gnav__container--item"><a class="js-gnav" href="reserve.html">Reserve</a></li>
                        <li class="gnav__container--item"><a class="js-gnav" href="blog.html">Blog</a></li>
                        <li class="gnav__container--item"><a class="js-gnav" href="contact.php">Contact</a></li>
                        <li class="gnav__container--item"><a class="js-gnav" href="account.html"><i class="fa-solid fa-circle-user"></i>Account</a></li>
                    </ul>
                </nav>
            </div>
        </header>
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
                                            <?php
                                                $subject = ['質問', 'お店へのお問い合わせ', '予約の取り消し', 'サイトの質問'];
                                                $i = 0;
                                            ?>
                                            <?php while ($i < count($subject)): ?>
                                                <?php if (isset($_SESSION['toMail']) && $toMail->get_subject() === $subject[$i]) :?>
                                                    <option value="<?php echo $i; ?>" selected><?php echo $subject[$i]; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $subject[$i]; ?></option>
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
                                    <?php if (isset($_SESSION['toMail'])): ?>
                                        <input type="text" name="firstName" value="<?php echo $toMail->get_provide_name()[0]; ?>" id="form-username" class="form-focus" placeholder="姓" required>
                                        <input type="text" name="lastName" value="<?php echo $toMail->get_provide_name()[1]; ?>" class="form-focus" placeholder="名" required>
                                    <?php else: ?>
                                        <input type="text" name="firstName" id="form-username" class="form-focus" placeholder="姓" required><input type="text" name="lastName" class="form-focus" placeholder="名" required>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required"><label for="form-tel">電話番号</label></dt>
                                <dd>
                                    <?php if (isset($_SESSION['toMail'])): ?>
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
                                    <?php if (isset($_SESSION['toMail'])): ?>
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
                                    <?php if (isset($_SESSION['toMail'])): ?>
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
        <footer class="footer">
            <div class="content-w">
                <div class="footer__flex-container">
                    <section class="footer__container">
                        <h2 class="footer__container--title"><i class="fa-solid fa-map-location-dot"></i>AccessMap</h2>
                        <figure class="footer__container--map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3275.365969722052!2d134.68356131578972!3d34.82188998040347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3554e068d937f609%3A0x2235a20e0db002cd!2z5aer6Lev5oOF5aCx44K344K544OG44Og5bCC6ZaA5a2m5qCh!5e0!3m2!1sja!2sjp!4v1668082245888!5m2!1sja!2sjp" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <figcaption class="footer__container--map-caption">
                                <p>定休日　毎週月曜日・第1火曜日・第3日曜日</p>
                                <p>営業時間　<time datetime="8h">9：00～17：00</time></p>
                                <address>〒670-0965 兵庫県姫路市東延末2丁目25</address>
                            </figcaption>
                        </figure>
                    </section>
                    <div class="footer__grid-box">
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="menu.html" class="footer__menu-content"><i class="fa-solid fa-scissors"></i>MenuList</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="menu.html#common">一般客向けの価格</a></li>
                                <li><a href="menu.html#unversity">大学・専門学生向けの価格</a></li>
                                <li><a href="menu.html#junior-high">高校・中学生向けの価格</a></li>
                                <li><a href="menu.html#elementary">小学生向けの価格</a></li>
                                <li><a href="menu.html#child">幼児向けの価格</a></li>
                            </ul>
                        </section>
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="reserve.html" class="footer__reserve-content"><i class="fa-regular fa-calendar-days"></i>Reserve</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="reserve.html">予約状況</a></li>
                                <li><a href="reserve_day.html">今日の予約</a></li>
                            </ul>
                        </section>
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="blog.html" class="footer__blog-content"><i class="fa-solid fa-blog"></i>Blog</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="blog-content_01.html">当店のシャワーヘッドは、塩素除去によって髪の毛や頭皮のダメージを抑えてあなたに寄り添います</a></li>
                                <li><a href="blog-content_02.html">刈り上げヘアが好きだ！そんな貴方へ朗報です！！！！</a></li>
                                <li><a href="blog-content_03.html">Bordeauxでうるツヤ髪へ、シルクのような抜群の手触りに</a></li>
                                <li><a href="blog-content_04.html">２回目ご来店の方限定のお得なクーポンのご紹介。</a></li>
                                <li><a href="blog-content_05.html">Bordeauxのお得情報！スタンプを10個以上集めた方に次回来客すれば特典を差し上げます！　.</a></li>
                            </ul>
                        </section>
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="account.html" class="footer__account-content"><i class="fa-solid fa-circle-user"></i>Account</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="account.html">アカウント登録</a></li>
                                <li><a href="account_login.html">ログイン</a></li>
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="footer__flex-container">
                    <div class="footer__flex-container-item">
                        <h2 class="footer--title"><a href="./"><img src="images/footer_logo.svg" alt="Bordeaux" width="142" height="50"></a></h2>
                        <p class="copyright"><small>© 2022 Bordeaux All rights reserved.</small></p>
                    </div>
                    <p class="btn__outer footer--btn"><a class="btn" href="contact.php"><i class="fa-sharp fa-solid fa-paper-plane"></i>お問い合わせ</a></p>
                </div>
            </div>
        </footer>
    </body>
</html>