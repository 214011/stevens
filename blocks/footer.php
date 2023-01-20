<?php
    require_once(__DIR__ . '/../lib/url.php');
?>
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
                    <h2 class="footer__container--title"><a href="menu.php" class="footer__menu-content"><i class="fa-solid fa-scissors"></i>MenuList</a></h2>
                    <ul class="footer__container--list" id="menu__link-list">
                        <li><a href="menu.php#common">一般客向けの価格</a></li>
                        <li><a href="menu.php#university">大学・専門学生向けの価格</a></li>
                        <li><a href="menu.php#junior-high">高校・中学生向けの価格</a></li>
                        <li><a href="menu.php#elementary">小学生向けの価格</a></li>
                        <li><a href="menu.php#child">幼児向けの価格</a></li>
                    </ul>
                </section>
                <section class="footer__container">
                    <h2 class="footer__container--title"><a href="reserve.php" class="footer__reserve-content"><i class="fa-regular fa-calendar-days"></i>Reserve</a></h2>
                    <ul class="footer__container--list">
                        <li><a href="reserve.php">予約状況</a></li>
                        <li><a href="reserve_day.php">今日の予約</a></li>
                    </ul>
                </section>
                <section class="footer__container">
                    <h2 class="footer__container--title"><a href="blog.php" class="footer__blog-content"><i class="fa-solid fa-blog"></i>Blog</a></h2>
                    <ul class="footer__container--list">
                        <li><a href="blog-content_01.php">当店のシャワーヘッドは、塩素除去によって髪の毛や頭皮のダメージを抑えてあなたに寄り添います</a></li>
                        <li><a href="blog-content_02.php">刈り上げヘアが好きだ！そんな貴方へ朗報です！！！！</a></li>
                        <li><a href="blog-content_03.php">Bordeauxでうるツヤ髪へ、シルクのような抜群の手触りに</a></li>
                        <li><a href="blog-content_04.php">２回目ご来店の方限定のお得なクーポンのご紹介。</a></li>
                        <li><a href="blog-content_05.php">Bordeauxのお得情報！スタンプを10個以上集めた方に次回来客すれば特典を差し上げます！　.</a></li>
                    </ul>
                </section>
                <section class="footer__container">
                    <h2 class="footer__container--title"><a href="account.php" class="footer__account-content"><i class="fa-solid fa-circle-user"></i>Account</a></h2>
                    <ul class="footer__container--list">
                        <?php if (Login::is_login()): ?>
                            <li><a href="account_info.php">アカウント情報</a></li>
                            <li><a href="account_logout.php">ログアウト</a></li>
                        <?php else: ?>
                            <li><a href="account.php">アカウント登録</a></li>
                            <li><a href="account_login.php">ログイン</a></li>
                        <?php endif; ?>
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