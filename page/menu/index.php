<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>メニュー｜Bordeaux</title>
        <?php get_head(); ?>
        <script src="<?php echo js->get_file('menu.js'); ?>"></script>
    </head>
    <body class="bg__menu">
        <?php get_header(); ?>
        <main class="main">
            <h2 class="main--title main--title_menu">
                <span class="span-block"><i class="fa-solid fa-scissors"></i>MenuList</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">メニューリスト</span>
            </h2>
            <div class="menu content-w main__content">
                <ul class="menu__link-list">
                    <li class="menu__link-list--item"><a class="btn" href="#common">一般</a></li>
                    <li class="menu__link-list--item"><a class="btn" href="#university">大学生・専門学生</a></li>
                    <li class="menu__link-list--item"><a class="btn" href="#junior-high">中学生・高校生</a></li>
                    <li class="menu__link-list--item"><a class="btn" href="#elementary">小学生</a></li>
                    <li class="menu__link-list--item"><a class="btn" href="#child">幼児</a></li>
                </ul>
                <div class="menu__wrap">
                    <section class="menu__container">
                        <h3 class="menu__container--title" id="common">一般</h3>
                        <section class="menu__container--item">
                            <h4>Main</h4>
                            <section class="menu__container--item_price">
                                <h5>カット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>デザインカット</dt>
                                            <dd>￥4,400</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>カット</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>前髪カット</dt>
                                            <dd>￥1,350</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>眉カット</dt>
                                            <dd>￥850</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>カラーリング</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>全体カラー</dt>
                                            <dd>￥6,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ブリーチ+カラー</dt>
                                            <dd>￥6,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ハイライト</dt>
                                            <dd>￥6,850</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>根元カラー</dt>
                                            <dd>￥6,850</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>白髪染め</dt>
                                            <dd>￥4,500</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>パーマ</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>パーマ</dt>
                                            <dd>￥5,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>デジタルパーマ</dt>
                                            <dd>￥5,700</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ポイントパーマ</dt>
                                            <dd>￥5,650</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ストレートパーマ</dt>
                                            <dd>￥5,650</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                        <section class="menu__container--item">
                            <h4>Option</h4>
                            <section class="menu__container--item_price">
                                <h5>トリートメント</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>保湿トリートメント</dt>
                                            <dd>￥3,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>再生トリートメント</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘアセット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>ヘアセット</dt>
                                            <dd>￥2,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>成人式・結婚式</dt>
                                            <dd>￥3,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘッドスパ</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>スタンダード</dt>
                                            <dd>￥3,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>プレミアム</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                    <section class="menu__container">
                        <h3 class="menu__container--title" id="university">大学生・専門学生</h3>
                        <section class="menu__container--item">
                            <h4>Main</h4>
                            <section class="menu__container--item_price">
                                <h5>カット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>デザインカット</dt>
                                            <dd>￥3,850</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>カット</dt>
                                            <dd>￥3,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>前髪カット</dt>
                                            <dd>￥1,200</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>眉カット</dt>
                                            <dd>￥850</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>カラーリング</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>全体カラー</dt>
                                            <dd>￥5,550</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ブリーチ+カラー</dt>
                                            <dd>￥5,550</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ハイライト</dt>
                                            <dd>￥5,750</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>根元カラー</dt>
                                            <dd>￥5,750</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>白髪染め</dt>
                                            <dd>￥4,500</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>パーマ</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>パーマ</dt>
                                            <dd>￥5,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>デジタルパーマ</dt>
                                            <dd>￥5,200</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ポイントパーマ</dt>
                                            <dd>￥5,100</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>ストレートパーマ</dt>
                                            <dd>￥5,100</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                        <section class="menu__container--item">
                            <h4>Option</h4>
                            <section class="menu__container--item_price">
                                <h5>トリートメント</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>保湿トリートメント</dt>
                                            <dd>￥3,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>再生トリートメント</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘアセット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>ヘアセット</dt>
                                            <dd>￥2,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>成人式・結婚式</dt>
                                            <dd>￥3,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘッドスパ</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>スタンダード</dt>
                                            <dd>￥3,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>プレミアム</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                    <section class="menu__container">
                        <h3 class="menu__container--title" id="junior-high">中学生・高校生</h3>
                        <section class="menu__container--item">
                            <h4>Main</h4>
                            <section class="menu__container--item_price">
                                <h5>カット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>スクールカット</dt>
                                            <dd>￥2,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>カット</dt>
                                            <dd>￥2,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>前髪カット</dt>
                                            <dd>￥1,100</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>眉カット</dt>
                                            <dd>￥800</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                        <section class="menu__container--item">
                            <h4>Option</h4>
                            <section class="menu__container--item_price">
                                <h5>トリートメント</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>保湿トリートメント</dt>
                                            <dd>￥3,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>再生トリートメント</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘアセット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>ヘアセット</dt>
                                            <dd>￥2,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘッドスパ</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>スタンダード</dt>
                                            <dd>￥3,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>プレミアム</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                    <section class="menu__container">
                        <h3 class="menu__container--title" id="elementary">小学生</h3>
                        <section class="menu__container--item">
                            <h4>Main</h4>
                            <section class="menu__container--item_price">
                                <h5>カット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>デザインカット</dt>
                                            <dd>￥1,800</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>カット</dt>
                                            <dd>￥2,300</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>前髪カット</dt>
                                            <dd>￥1,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>眉カット</dt>
                                            <dd>￥750</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                        <section class="menu__container--item">
                            <h4>Option</h4>
                            <section class="menu__container--item_price">
                                <h5>トリートメント</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>保湿トリートメント</dt>
                                            <dd>￥3,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>再生トリートメント</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘアセット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>ヘアセット</dt>
                                            <dd>￥2,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘッドスパ</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>スタンダード</dt>
                                            <dd>￥3,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>プレミアム</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                    <section class="menu__container">
                        <h3 class="menu__container--title" id="child">幼児</h3>
                        <section class="menu__container--item">
                            <h4>Main</h4>
                            <section class="menu__container--item_price">
                                <h5>カット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>カット</dt>
                                            <dd>￥2,000</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>前髪カット</dt>
                                            <dd>￥500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>眉カット</dt>
                                            <dd>￥450</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                        <section class="menu__container--item">
                            <h4>Option</h4>
                            <section class="menu__container--item_price">
                                <h5>トリートメント</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>保湿トリートメント</dt>
                                            <dd>￥3,500</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>再生トリートメント</dt>
                                            <dd>￥4,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                            <section class="menu__container--item_price">
                                <h5>ヘアセット</h5>
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>ヘアセット</dt>
                                            <dd>￥2,000</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </section>
                        </section>
                    </section>
                </div>
            </div>
            <button type="button" id="js-toTop">
                <span class="span-block toTop__inner">
                    <span class="span-block toTop__inner--text">TOP</span>
                    <span class="fa-sr-only">へ戻る</span>
                    <span class="span-block toTop__inner--icon"><i class="fa-solid fa-bars-progress"></i></span>
                </span>
            </button>
        </main>
        <?php get_footer(); ?>
    </body>
</html>