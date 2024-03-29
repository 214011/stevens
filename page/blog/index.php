<?php require_once('../../module/utility_functions.php'); ?>
<?php
    $images = new URL('images');
    $blog = new URL(['page', 'blog']);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ブログ｜Bordeaux</title>
        <?php get_head(); ?>
    </head>
    <body class="bg bg__blog-top">
        <?php get_header(); ?>
        <main class="main">
            <h2 class="main--title main--title_blog">
                <span class="span-block"><i class="fa-solid fa-blog"></i>Blog</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">ブログ</span>
            </h2>
            <div class="main__content">
                <div class="main__content--blog">
                    <article class="content-w">
                        <h3 class="main__content--blog__title">
                            <span>LATEST</span>
                            <span class="fa-sr-only">-</span>
                            <span>最新記事</span>
                        </h3>
                        <figure class="main__content--blog__latest">
                            <div class="main__content--blog__latest--img">
                                <img src="<?php echo $images->get_file('blog-kubata.jpg'); ?>" alt="天然水" width="680" height="454">
                            </div>
                            <figcaption>
                                <section class="main__content--blog__latest--content">
                                    <h4 class="main__content--blog__latest--content-title">
                                        当店のシャワーヘッドは、塩素分解によって髪の毛や頭皮のダメージを抑えてあなたに寄り添います</h4>
                                    <div class="main__content--blog__latest--content-info">
                                        <dl class="main__content--blog__published">
                                            <dt><i class="fa-regular fa-clock"></i><span class="fa-sr-only">公開日</span></dt>
                                            <dd><time datetime="2022-12-09">2022.12.07</time></dd>
                                        </dl>
                                        <dl class="main__content--blog__category">
                                            <dt><i class="fa-solid fa-tags"></i><span class="sr-only">カテゴリー</span></dt>
                                            <dd>
                                                <ul class="main__content--blog__category--tag">
                                                    <li><a href="#">髪のすゝめ</a></li>
                                                    <li><a href="#">つぶやき</a></li>
                                                    <li><a href="#">店内情報</a></li>
                                                </ul>
                                            </dd>
                                        </dl>
                                    </div>
                                    <p class="btn__outer main__content--blog__latest--content-btn"><a class="btn" href="<?php echo $blog->get_file('content_01.php'); ?>">この記事を見る</a></p>
                                </section>
                            </figcaption>
                        </figure>
                        <div class="main__content--blog__container">
                            <a href="<?php echo $blog->get_file('content_02.php'); ?>">
                                <figure class="main__content--blog__card">
                                    <div class="main__content--blog__card--img">
                                        <img src="<?php echo $images->get_file('blog_arisue.jpg'); ?>" alt="バリカンのイメージ画像" width="2239" height="2560">
                                    </div>
                                    <figcaption>
                                        <section class="main__content--blog__card--content">
                                            <h4 class="main__content--blog__card--content-title">刈り上げヘアが好きだ！そんな貴方へ朗報です！！！！
                                            </h4>
                                            <dl class="main__content--blog__published">
                                                <dt><i class="fa-regular fa-clock"></i><span class="fa-sr-only">公開日</span>
                                                </dt>
                                                <dd><time datetime="2022-12-09">2022.12.07</time></dd>
                                            </dl>
                                            <dl class="main__content--blog__category">
                                                <dt><i class="fa-solid fa-tags"></i><span class="sr-only">カテゴリー</span></dt>
                                                <dd>
                                                    <ul class="main__content--blog__category--tag">
                                                        <li>髪のすゝめ</li>
                                                        <li>つぶやき</li>
                                                        <li>店内情報</li>
                                                    </ul>
                                                </dd>
                                            </dl>
                                        </section>
                                    </figcaption>
                                </figure>
                            </a>
                            <a href="<?php echo $blog->get_file('content_03.php'); ?>">
                                <figure class="main__content--blog__card">
                                    <div class="main__content--blog__card--img">
                                        <img src="<?php echo $images->get_file('blog_nagai.jpg'); ?>" alt="髪の毛さらさら" width="1080" height="608">
                                    </div>
                                    <figcaption>
                                        <section class="main__content--blog__card--content">
                                            <h4 class="main__content--blog__card--content-title">
                                                Bordeauxでうるツヤ髪へシルクのような抜群の手触りに</h4>
                                            <dl class="main__content--blog__published">
                                                <dt><i class="fa-regular fa-clock"></i><span class="fa-sr-only">公開日</span>
                                                </dt>
                                                <dd><time datetime="2022-12-09">2022.12.07</time></dd>
                                            </dl>
                                            <dl class="main__content--blog__category">
                                                <dt><i class="fa-solid fa-tags"></i><span class="sr-only">カテゴリー</span></dt>
                                                <dd>
                                                    <ul class="main__content--blog__category--tag">
                                                        <li>髪のすゝめ</li>
                                                        <li>店内情報</li>
                                                    </ul>
                                                </dd>
                                            </dl>
                                        </section>
                                    </figcaption>
                                </figure>
                            </a>
                            <a href="<?php echo $blog->get_file('content_04.php'); ?>">
                                <figure class="main__content--blog__card">
                                    <div class="main__content--blog__card--img">
                                        <img src="<?php echo $images->get_file('blog_murakami.jpg'); ?>" alt="クーポンの紹介" width="1920" height="1440">
                                    </div>
                                    <figcaption>
                                        <section class="main__content--blog__card--content">
                                            <h4 class="main__content--blog__card--content-title">２回目ご来店の方限定のお得なクーポンのご紹介
                                            </h4>
                                            <dl class="main__content--blog__published">
                                                <dt><i class="fa-regular fa-clock"></i><span class="fa-sr-only">公開日</span>
                                                </dt>
                                                <dd><time datetime="2022-12-09">2022.12.07</time></dd>
                                            </dl>
                                            <dl class="main__content--blog__category">
                                                <dt><i class="fa-solid fa-tags"></i><span class="sr-only">カテゴリー</span></dt>
                                                <dd>
                                                    <ul class="main__content--blog__category--tag">
                                                        <li>お得情報</li>
                                                        <li>店内情報</li>
                                                    </ul>
                                                </dd>
                                            </dl>
                                        </section>
                                    </figcaption>
                                </figure>
                            </a>
                            <a href="<?php echo $blog->get_file('content_05.php'); ?>">
                                <figure class="main__content--blog__card">
                                    <div class="main__content--blog__card--img">
                                        <img src="<?php echo $images->get_file('blog_nomura.jpg'); ?>" alt="Bordeauxのお得情報！" width="1000" height="667">
                                    </div>
                                    <figcaption>
                                        <section class="main__content--blog__card--content">
                                            <h4 class="main__content--blog__card--content-title">
                                                Bordeauxのお得情報！スタンプを10個以上集めた方に次回来客すれば特典を差し上げま
                                                す！</h4>
                                            <dl class="main__content--blog__published">
                                                <dt><i class="fa-regular fa-clock"></i><span class="fa-sr-only">公開日</span>
                                                </dt>
                                                <dd><time datetime="2022-12-09">2022.12.07</time></dd>
                                            </dl>
                                            <dl class="main__content--blog__category">
                                                <dt><i class="fa-solid fa-tags"></i><span class="sr-only">カテゴリー</span></dt>
                                                <dd>
                                                    <ul class="main__content--blog__category--tag">
                                                        <li>お得情報</li>
                                                        <li>店長より</li>
                                                        <li>店内情報</li>
                                                    </ul>
                                                </dd>
                                            </dl>
                                        </section>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>