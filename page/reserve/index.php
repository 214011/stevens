<?php require_once('../../module/utility_functions.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>予約｜Bordeaux</title>
        <?php get_head(); ?>
        <?php
            $js = new URL('js');
        ?>
        <script src="<?php echo $js->get_file('reserve.js'); ?>"></script>
    </head>
    <body>
        <?php get_header(); ?>
        <main class="main">
            <h2 class="main--title main--title_reserve">
                <span class="span-block"><i class="fa-regular fa-calendar-days"></i>Reserve</span>
                <span class="fa-sr-only">-</span>
                <span class="span-block">予約</span>
            </h2>
            <div class="reserve main__content content-w">
                <div class="reserve__calender--container">
                    <?php get_module_calender(); ?>
                </div>
                <section class="reserve__today">
                    <h3 class="reserve__today--title">
                        <span class="span-block">
                            <span class="span-block">Today</span>
                            <span class="fa-sr-only">-</span>
                            <span class="span-block">今日の予約</span>
                        </span>
                    </h3>
                    <ul class="reserve__today--container">
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>9:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>10:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>11:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>12:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>13:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>14:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>15:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                        <li class="reserve__today--container_item">
                            <dl>
                                <dt>16:00~</dt>
                                <dd>
                                    <dl>
                                        <dt>空き</dt>
                                        <dd>4人</dd>
                                    </dl>
                                </dd>
                                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
                            </dl>
                        </li>
                    </ul>
                </section>
            </div>
        </main>
        <?php get_footer(); ?>
    </body>
</html>