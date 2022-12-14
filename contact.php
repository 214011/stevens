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
                <span class="span-block">??????????????????</span>
            </h2>
            <div class="contact main__content content-w">
                <div class="contact--text">
                    <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                    <p>?????????????????????????????????????????????????????????????????????</p>
                    <p>??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                    <p>???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</p>
                </div>
                <form action="./confirm.php" method="POST" class="contact__container">
                    <ul class="contact__container--contact-table">
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt><label for="form-subject">?????????</label></dt>
                                <dd>
                                    <label for="form-subject">
                                        <select name="subject" id="form-subject" class="form-focus">
                                            <?php $i = 0; ?>
                                            <?php while ($i < count(ToMail::$subjects)): ?>
                                                <?php if (isset($_SESSION['toMail']) && $toMail->get_subject() === ToMail::$subjects[$i]) :?>
                                                    <option value="<?php echo $i; ?>" selected><?php echo ToMail::$subjects[$i]; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $i; ?>"><?php echo ToMail::$subjects[$i]; ?></option>
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
                                <dt class="form-required"><label for="form-username">?????????</label></dt>
                                <dd>
                                    <?php if (isset($_SESSION['toMail'])): ?>
                                        <input type="text" name="firstName" value="<?php echo $toMail->get_provide_name()[0]; ?>" id="form-username" class="form-focus" placeholder="???" required>
                                        <input type="text" name="lastName" value="<?php echo $toMail->get_provide_name()[1]; ?>" class="form-focus" placeholder="???" required>
                                    <?php else: ?>
                                        <input type="text" name="firstName" id="form-username" class="form-focus" placeholder="???" required><input type="text" name="lastName" class="form-focus" placeholder="???" required>
                                    <?php endif; ?>
                                </dd>
                            </dl>
                        </li>
                        <li class="contact-table__row">
                            <dl class="contact-table__row--col">
                                <dt class="form-required"><label for="form-tel">????????????</label></dt>
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
                                <dt class="form-required"><label for="form-email">?????????????????????</label></dt>
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
                                <dt class="form-required"><label for="form-contact_content">????????????????????????</label></dt>
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
                        <input type="submit" id="form-submit" value="??????" class="fa-sr-only">
                        <label for="form-submit" class="btn"><i class="fa-sharp fa-solid fa-paper-plane"></i>????????????</label>
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
                                <p>?????????????????????????????????1???????????????3?????????</p>
                                <p>???????????????<time datetime="8h">9???00???17???00</time></p>
                                <address>???670-0965 ???????????????????????????2??????25</address>
                            </figcaption>
                        </figure>
                    </section>
                    <div class="footer__grid-box">
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="menu.html" class="footer__menu-content"><i class="fa-solid fa-scissors"></i>MenuList</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="menu.html#common">????????????????????????</a></li>
                                <li><a href="menu.html#unversity">????????????????????????????????????</a></li>
                                <li><a href="menu.html#junior-high">?????????????????????????????????</a></li>
                                <li><a href="menu.html#elementary">????????????????????????</a></li>
                                <li><a href="menu.html#child">?????????????????????</a></li>
                            </ul>
                        </section>
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="reserve.html" class="footer__reserve-content"><i class="fa-regular fa-calendar-days"></i>Reserve</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="reserve.html">????????????</a></li>
                                <li><a href="reserve_day.html">???????????????</a></li>
                            </ul>
                        </section>
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="blog.html" class="footer__blog-content"><i class="fa-solid fa-blog"></i>Blog</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="blog-content_01.html">???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</a></li>
                                <li><a href="blog-content_02.html">???????????????????????????????????????????????????????????????????????????</a></li>
                                <li><a href="blog-content_03.html">Bordeaux??????????????????????????????????????????????????????????????????</a></li>
                                <li><a href="blog-content_04.html">?????????????????????????????????????????????????????????????????????</a></li>
                                <li><a href="blog-content_05.html">Bordeaux?????????????????????????????????10??????????????????????????????????????????????????????????????????????????????.</a></li>
                            </ul>
                        </section>
                        <section class="footer__container">
                            <h2 class="footer__container--title"><a href="account.html" class="footer__account-content"><i class="fa-solid fa-circle-user"></i>Account</a></h2>
                            <ul class="footer__container--list">
                                <li><a href="account.html">?????????????????????</a></li>
                                <li><a href="account_login.html">????????????</a></li>
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="footer__flex-container">
                    <div class="footer__flex-container-item">
                        <h2 class="footer--title"><a href="./"><img src="images/footer_logo.svg" alt="Bordeaux" width="142" height="50"></a></h2>
                        <p class="copyright"><small>?? 2022 Bordeaux All rights reserved.</small></p>
                    </div>
                    <p class="btn__outer footer--btn"><a class="btn" href="contact.php"><i class="fa-sharp fa-solid fa-paper-plane"></i>??????????????????</a></p>
                </div>
            </div>
        </footer>
    </body>
</html>