<?php require_once('../../module/utility_functions.php'); ?>
<?php
    $js = new URL('js');
    $images = new URL('images');
    $blog = new URL(['page', 'blog']);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ブログ｜Bordeauxのお得情報！スタンプを10個以上集めた方に次回来客すれば特典を差し上げます！</title>
        <?php get_head(); ?>
        <script src="<?php echo $js->get_file('blog.js'); ?>"></script>
    </head>
    <body>
        <?php get_header(); ?>
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
                            <li><a href="#">店長より</a></li>
                            <li><a href="#">店内情報</a></li>
                        </ul>
                    </dd>
                </dl>
                <figure class="blog__image">
                    <img src="<?php echo $images->get_file('blog_nomura.jpg'); ?>" alt="Bordeauxのお得情報！" width="1000" height="667">
                </figure>
                <div class="blog__container">
                    <h2 class="blog__container--title">Bordeauxのお得情報！スタンプを10個以上集めた方に次回来客すれば特典を差し上げます！</h2>
                    <p class="blog__container--text">
                        当店Bordeaux（ボルドー）のスタンプを10個以上集めた方に、次回来客時にお客様お好みの商品やオプションメニューを何か1つ無料でサービスいたします。</p>
                    <p class="blog__container--text">商品は、当店自慢のシャンプー、トリートメント、リンスやワックスなど取り扱っている全ての商品から選べます。</p>
                    <p class="blog__container--text">オプションメニューは、ヘッドスパや毛染めをご用意しておりますのでお好きなのを１つお選び下さい！</p>
                    <p class="blog__container--text br-mt">
                        スタンプが10個目の方は何か１つ無料でサービスいたします。20個目の方は商品から1つ購入される方へ30％OFFをつけさていただきます。</p>
                    <p class="blog__container--text">
                        <mark>特典はスタンプ10個おきにお付けします。10の桁が奇数（10,30,50）の場合に無料サービスをお付けします。10の桁が偶数（20,40,60）の場合は商品のみ1点だけのご購入につき30％OFFとさせていただきます。</mark>
                    </p>
                    <p class="blog__container--text">
                        特典内容はスタンプの個数が多ければ多いほど、変わる場合がございます。スタンプをいっぱい貯めてお得に髪のお手入れをスタイリッシュに、そしてビューティーにしていきましょう！</p>
                </div>
            </article>
            <div class="blog__pager content-w">
                <button class="blog__pager--previousBtn" type="button" onclick="location.href='<?php echo $blog->get_file('content_04.php'); ?>'"><span class="fa-sr-only">前の記事へ</span></button>
                <ul class="blog__pager--link">
                    <li class="blog__pager--link_item"><a href="<?php echo $blog->get_file('content_01.php'); ?>">1</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo $blog->get_file('content_02.php'); ?>">2</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo $blog->get_file('content_03.php'); ?>">3</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo $blog->get_file('content_04.php'); ?>">4</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo $blog->get_file('content_05.php'); ?>" class="__blog-current">5</a></li>
                </ul>
                <button class="blog__pager--nextBtn __blog-arrowBtn_none" type="button" onclick="location.href='#'"><span class="fa-sr-only">次の記事へ</span></button>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>