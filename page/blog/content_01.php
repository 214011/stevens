<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ブログ｜当店のシャワーヘッドは、塩素除去によって髪の毛や頭皮のダメージを抑えてあなたに寄り添います</title>
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
                    <img src="<?php echo images->get_file('blog-kubata.jpg'); ?>" alt="天然水" width="680" height="454">
                </figure>
                <div class="blog__container">
                    <h2 class="blog__container--title">当店のシャワーヘッドは、塩素除去によって髪の毛や頭皮のダメージを抑えてあなたに寄り添います</h2>
                    <p class="blog__container--text">
                        当店では水中の塩素を90％除去できるシャワーヘッドを使用しています。その中でも水は<mark>地元の山のふもとの湧水を使用しており、</mark>当店の厳しい水準を満たした天然水のみを使用しています。お肌がデリケートな方でも、この水なら安心して使用できるとお客様の声をいただいております！
                        <mark>この天然水は飲料としても愛飲されており、地元ではおなじみの商品となっています。</mark>身体の大部分を占めるのは水分です。
                        水分を取らなくても大丈夫…という人はまずいないでしょう。私たちは毎日必ず水分を摂取しています。
                        皆さんは普段飲料水として何を飲んでいますか？私は今までミルクティーを愛飲しておりましたが、最近は糖質が気になってまいりました…。そこで最近私が気になったのがこの天然水です。最初は私も「水なんてどこのものを飲んでも同じだろう」と考えていました。ですが、実際に飲んでみると衝撃が走りました。<mark>とてもすっきりしていて飲みやすく、後味に違和感もなく</mark>私は気づいたらコップに注がれた天然水を飲み干していました。そのくらい飲みやすいものでした。当店に使われているものは髪を洗う用のものなのでさすがに飲むことはできませんが…（笑）皆さんもぜひ地元スーパーなどで販売されている、この天然水を一度飲んでみてください！
                        あなたの天然水に関する見方が変わると思いますよ！
                    </p>

                </div>
            </article>
            <div class="blog__pager content-w">
                <button class="blog__pager--previousBtn __blog-arrowBtn_none" type="button"
                    onclick="location.href='#'"><span class="fa-sr-only">前の記事へ</span></button>
                <ul class="blog__pager--link">
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_01.php'); ?>" class="__blog-current">1</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_02.php'); ?>">2</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_03.php'); ?>">3</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_04.php'); ?>">4</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_05.php'); ?>">5</a></li>
                </ul>
                <button class="blog__pager--nextBtn" type="button" onclick="location.href='<?php echo blog->get_file('content_02.php'); ?>'"><span class="fa-sr-only">次の記事へ</span></button>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>