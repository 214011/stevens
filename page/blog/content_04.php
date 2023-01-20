<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ブログ｜２回目ご来店の方限定のお得なクーポンのご紹介。</title>
        <?php require_once('blocks/head.php'); ?>
        <script src="js/blog.js"></script>
    </head>
    <body>
        <?php require_once('blocks/header.php'); ?>
        <main class="main">
            <article class="blog content-w">
                <dl class="blog__published">
                    <dt><i class="fa-regular fa-clock"></i><span class="fa-sr-only">公開日</span></dt>
                    <dd><time datetime="2022-12-09">2022-12-9</time></dd>
                </dl>
                <dl class="blog__category">
                    <dt><i class="fa-solid fa-tags"></i><span class="sr-only">カテゴリー</span></dt>
                    <dd>
                        <ul class="blog__category--tag">
                            <li><a href="#">お得情報</a></li>
                            <li><a href="#">店内情報</a></li>
                        </ul>
                    </dd>
                </dl>
                <figure class="blog__image">
                    <img src="images/blog_murakami.jpg" alt="クーポンの紹介" width="1920" height="1440">
                </figure>
                <div class="blog__container">
                    <h2 class="blog__container--title">２回目ご来店の方限定のお得なクーポンのご紹介。</h2>
                    <p class="blog__container--text">初めてご来店くださった沢山のお客様、</p>
                    <p class="blog__container--text">Bordeauxに脚を運んでくださりありがとうございました。</p>
                    <p class="blog__container--text br-mt">Bordeauxでは、</p>
                    <p class="blog__container--text">そんなお客様の、コレからの綺麗のお手伝いを全力でさせていただきたい！</p>
                    <p class="blog__container--text">と言う思いから、</p>
                    <p class="blog__container--text">２回目ご来店の方限定★クーポンをご用意しております！</p>
                    <p class="blog__container--text">お得に髪を維持出来る、クーポンとなっておりますので、</p>
                    <p class="blog__container--text">是非ご利用ください！</p>
                    <p class="blog__container--text br-mt">ネットでのご予約はもちろん、お電話でもお気軽にご予約ください！</p>
                </div>
            </article>
            <div class="blog__pager content-w">
                <button class="blog__pager--previousBtn" type="button" onclick="location.href='blog-content_03.php'"><span class="fa-sr-only">前の記事へ</span></button>
                <ul class="blog__pager--link">
                    <li class="blog__pager--link_item"><a href="blog-content_01.php">1</a></li>
                    <li class="blog__pager--link_item"><a href="blog-content_02.php">2</a></li>
                    <li class="blog__pager--link_item"><a href="blog-content_03.php">3</a></li>
                    <li class="blog__pager--link_item"><a href="blog-content_04.php" class="__blog-current">4</a></li>
                    <li class="blog__pager--link_item"><a href="blog-content_05.php">5</a></li>
                </ul>
                <button class="blog__pager--nextBtn" type="button" onclick="location.href='blog-content_05.php'"><span class="fa-sr-only">次の記事へ</span></button>
            </div>
        </main>
        <?php require_once('blocks/footer.php'); ?>
    </body>
</html>