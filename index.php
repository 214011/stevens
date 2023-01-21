<?php require_once('module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Bordeaux</title>
        <?php get_head(); ?>
        <script src="<?php echo js->get_file('index.js'); ?>"></script>
    </head>
    <body class="bg bg__index-01">
        <?php get_header(); ?>
        <main>
            <section class="index__container">
                <div class="index__container--catchcopy">
                    <div class="content-w">
                        <h2 class="catchcopy--text">
                            <span class="catchcopy--text__Stylish"><img src="<?php echo images->get_file('index_Stylish.svg'); ?>" alt="Stylish" width="453" height="92"></span>
                            <span class="catchcopy--text__and"><img src="<?php echo images->get_file('index_and.svg'); ?>" alt="and" width="193" height="46"></span>
                            <span class="catchcopy--text__Beauty"><img src="<?php echo images->get_file('index_Beauty.svg'); ?>" alt="Beauty" width="426" height="89"></span>
                        </h2>
                    </div>
                </div>
            </section>
            <section class="index__container">
                <div class="index__container--lead">
                    <div class="content-w">
                        <h2 class="lead__title">
                            <span class="span-block">ようこそ</span>
                            <span class="span-block">美容院</span>
                            <span class="span-block"><span class="media__span-block">Bordeaux</span>（ボルドー）へ</span>
                        </h2>
                        <p class="lead__text">
                            <strong>
                                <span class="span-block">フランス語であるBordeaux（ボルドー）は日本語で「ワインレッド」という意味があります。</span>
                                <span class="span-block">大人の色合いがあるワインレッド。大人としてのあなたの見た目をこの美容院で</span>
                                <span class="span-block">整えていきませんか？</span>
                            </strong>
                        </p>
                    </div>
                </div>
            </section>
            <section class="index__container">
                <div class="index__container--content __menu-content">
                    <div class="content__area">
                        <div class="content__inner">
                            <h2 class="content__title">
                                <span class="span-block"><span class="content__title--main"><i class="fa-solid fa-scissors"></i>MenuList</span></span>
                                <span class="span-block fa-sr-only"> - </span>
                                <span class="span-block content__title--sub">メニューリスト</span>
                            </h2>
                            <div class="content__text">
                                <p>メニューは、一般,大学・専門学生,高校・中学生,小学生,幼児ごとに料金をご用意しております。</p>
                                <p>メニューの詳細は下のボタンからどうぞ</p>
                            </div>
                            <p class="btn__outer"><a class="btn" href="<?php echo menu->get_file(''); ?>">メニュー表の詳細へ</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="index__container d-fx fxd-rr">
                <div class="index__container--content __reserve-content">
                    <div class="content__area">
                        <div class="content__inner">
                            <h2 class="content__title">
                                <span class="span-block"><span class="content__title--main"><i class="fa-regular fa-calendar-days"></i>Reserve</span></span>
                                <span class="span-block fa-sr-only"> - </span>
                                <span class="span-block content__title--sub">予約</span>
                            </h2>
                            <div class="content__text">
                                <p>カットの予約と、予約状況の把握の確認ができます。予約せずとも当店にお越しいただけますが、予約客が優先ですので状況によりお時間いただきます。</p>
                            </div>
                            <p class="btn__outer"><a class="btn" href="<?php echo reserve->get_file(''); ?>">予約する</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="index__container">
                <div class="index__container--content __blog-content">
                    <div class="content__area">
                        <div class="content__inner">
                            <h2 class="content__title">
                                <span class="span-block"><span class="content__title--main"><i class="fa-solid fa-blog"></i>Blog</span></span>
                                <span class="span-block fa-sr-only"> - </span>
                                <span class="span-block content__title--sub">ブログ</span>
                            </h2>
                            <div class="content__text">
                                <p>おすすめのシャンプーや、流行りの髪型や当店（Bordeaux）の近況報告などをつぶやいているページが見れます。</p>
                                <p>お得情報もありますので是非チェック！</p>
                            </div>
                            <p class="btn__outer"><a class="btn" href="<?php echo blog->get_file(''); ?>">ブログを見る</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="index__container d-fx fxd-rr">
                <div class="index__container--content __contact-content">
                    <div class="content__area">
                        <div class="content__inner">
                            <h2 class="content__title">
                                <span class="span-block"><span class="content__title--main"><i class="fa-sharp fa-solid fa-paper-plane"></i>Contact</span></span>
                                <span class="span-block fa-sr-only"> - </span>
                                <span class="span-block content__title--sub">お問い合わせ</span>
                            </h2>
                            <div class="content__text">
                                <p>このサイト、当店の分からないことがあればなんでもお申し付け下さい！</p>
                                <p>予約の取り消しがリクエストできますので予定に不都合生じた際にご利用ください。もちろんお電話でも対応させていただきます！</p>
                            </div>
                            <p class="btn__outer"><a class="btn" href="<?php echo contact->get_file(''); ?>">お問い合わせページへ</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="index__container">
                <div class="index__container--content __account-content">
                    <div class="content__area">
                        <div class="content__inner">
                            <h2 class="content__title">
                                <span class="span-block"><span class="content__title--main"><i class="fa-solid fa-circle-user"></i>Account</span></span>
                                <span class="span-block fa-sr-only"> - </span>
                                <span class="span-block content__title--sub">アカウント登録</span>
                            </h2>
                            <div class="content__text">
                                <p>予約をする際、アカウント登録が必須となります。初回入店の方にはカット料金から15％OFFにさせていただきます。</p>
                                <p>加えてアカウントを登録していただくとオプションメニューが1つに限り無料となります。</p>
                            </div>
                            <p class="btn__outer"><a class="btn" href="<?php echo account_create->get_file(''); ?>">アカウント登録する</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php get_footer(); ?>
    </body>
</html>