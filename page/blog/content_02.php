<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ブログ｜刈り上げヘアが好きだ！そんな貴方へ朗報です！！！！</title>
        <?php get_head(); ?>
        <script src="<?php echo js->get_file('blog.js'); ?>"></script>
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
                            <li><a href="#">髪のすゝめ</a></li>
                            <li><a href="#">つぶやき</a></li>
                            <li><a href="#">店内情報</a></li>
                        </ul>
                    </dd>
                </dl>
                <figure class="blog__image">
                    <img src="<?php echo images->get_file('blog_arisue.jpg'); ?>" alt="バリカンのイメージ画像" width="2239" height="2560">
                </figure>
                <div class="blog__container">
                    <h2 class="blog__container--title">刈り上げヘアが好きだ！そんな貴方へ朗報です！！！！</h2>
                    <p class="blog__container--text">
                        当店の水準を満たした、最高級のバリカンを使用しています。その中でも刃は私の地元で職人が一つ一つ手作業で作り上げた最高品質のものを使用しており、当店の厳しい水準を満たした刃のみを使用しています。お肌がデリケートな方でもご安心で、この刃なら安心して刈り上げてもらえるとお客様の声をいただいております！
                    </p>
                    <p class="blog__container--text">このバリカンは家庭用としても愛刀されており、地元ではおなじみの最高品質商品となっております。身体の大部分を占めるのは毛です。</p>
                    <p class="blog__container--text">毛を剃らなくても大丈夫…という人は少ないでしょう。私たちは毎日必ず少しずつ毛が伸びています。</p>
                    <p class="blog__container--text">
                        皆さんは普段、美容室選びとして何を重視していますか？私は今までカミソリを愛用しておりましたが、最近は流行が気になり、そこで最近私が気になったのがこのバリカンです。最初は私も「バリカンなんてどこのものを使っても同じだろう」と考えていました。ですが、実際に刈り上げてみると衝撃が走りました。とても刈り上げやすくてモテやすく、完成に違和感もなく私は気づいたらモテモテになり告白されまくりました。夢のTV出演も果たしました！そのくらい人生が変わりました。
                    </p>
                    <p class="blog__container--text">当店に使われているものは髪を刈り上げるために開発された当店の水準をクリアした最高品質のものなのです！</p>
                    <p class="blog__container--text">なのでいいお値段はしますが、当店ではお客様の髪のことを常に考えております。</p>
                    <p class="blog__container--text">皆さんもぜひ当店の刈り上げを一度お試しあれ！</p>
                    <p class="blog__container--text">あなたの刈り上げに関する見方が変わると思いますよ！</p>
                </div>
            </article>
            <div class="blog__pager content-w">
                <button class="blog__pager--previousBtn __blog-arrowBtn" type="button"
                    onclick="location.href='<?php echo blog->get_file('content_01.php'); ?>'"><span class="fa-sr-only">前の記事へ</span></button>
                <ul class="blog__pager--link">
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_01.php'); ?>">1</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_02.php'); ?>" class="__blog-current">2</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_03.php'); ?>">3</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_04.php'); ?>">4</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_05.php'); ?>">5</a></li>
                </ul>
                <button class="blog__pager--nextBtn" type="button" onclick="location.href='<?php echo blog->get_file('content_03.php'); ?>'"><span class="fa-sr-only">次の記事へ</span></button>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>