<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ブログ｜Bordeauxでうるツヤ髪へ、シルクのような抜群の手触りに</title>
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
                            <li><a href="#">店内情報</a></li>
                        </ul>
                    </dd>
                </dl>
                <figure class="blog__image">
                    <img src="<?php echo images->get_file('blog_nagai.jpg'); ?>" alt="髪の毛さらさら" width="1600" height="1066">
                </figure>
                <div class="blog__container">
                    <h2 class="blog__container--title">Bordeauxでうるツヤ髪へ、シルクのような抜群の手触りに</h2>

                    <p class="blog__container--text">うるツヤになれる厳選トリートメントも当店の自慢です。</p>
                    <p class="blog__container--text">ブリーチや矯正を重ねたボロボロの髪も<mark>【再生トリートメント】で短期で高補修します。</mark></p>
                    <p class="blog__container--text"><mark>一人一人に合わせてオーダーメイド</mark>し、超音波のコテを使い髪の芯部まで栄養を入れ込むことで、 施術後の自分の髪に嘘みたいと驚くはずです。</p>
                    <p class="blog__container--text">理想の髪質に合わせてベストなトリートメントが選べるから、ツヤ感はもちろん手触りも抜群です。</p>
                    <p class="blog__container--text">高彩度なカラーを維持するためのプレミアムなトリートメントで、カラーをしてもダメージが気にならず、うるツヤ髪になれます。</p>
                    <p class="blog__container--text">また、薬剤を使用するメニューにはTOKIOトリートメント付です。</p>
                    <p class="blog__container--text">ファッションやメイクは素髪の美しさがあってこそ映えるもの。美容感度の高い女性に大人気の《INCE》素材を大切に、通えば通うほど髪の質が変わることを実感下さい。<mark>シルクのような抜群の手触りがお手頃価格で叶います。</mark></p>
                    <p class="blog__container--text">パサつきやゴワゴワ感など自身の髪にお悩みのある方は是非当店に足を運んでください。</p>

                </div>
            </article>
            <div class="blog__pager content-w">
                <button class="blog__pager--previousBtn __blog-arrowBtn" type="button" onclick="location.href='<?php echo blog->get_file('content_02.php'); ?>'"><span class="fa-sr-only">前の記事へ</span></button>
                <ul class="blog__pager--link">
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_01.php'); ?>">1</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_02.php'); ?>">2</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_03.php'); ?>" class="__blog-current">3</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_04.php'); ?>">4</a></li>
                    <li class="blog__pager--link_item"><a href="<?php echo blog->get_file('content_05.php'); ?>">5</a></li>
                </ul>
                <button class="blog__pager--nextBtn" type="button" onclick="location.href='<?php echo blog->get_file('content_04.php'); ?>'"><span class="fa-sr-only">次の記事へ</span></button>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>