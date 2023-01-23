<?php require_once('../../../module/utility_functions.php'); ?>
<?php if (isset($_GET['date'])): ?>
    <!DOCTYPE html>
    <html lang="ja">
        <head>
            <title>予約｜Bordeaux</title>
            <?php get_head(); ?>
            <?php
                get_class_mydate();
                $date = new MyDate($_GET['date']);
                $js = new URL('js');
            ?>
            <script src="<?php echo $js->get_file('reserve.js'); ?>"></script>
        </head>
        <body>
            <?php get_header(); ?>
            <main class="main">
                <div class="reserve __reserve-day main__content content-w">
                    <div class="reserve__calender--container">
                        <?php get_module_calender(); ?>
                    </div>
                    <section class="reserve__today">
                        <h3 class="reserve__today--title">
                            <span class="span-block">
                                <span class="span-block"><?php echo $date->getMonth(); ?>月<?php echo $date->getDate(); ?>日</span>
                                <span class="fa-sr-only">-</span>
                                <span class="span-block"><?php echo MyDate::ja_week_format($date->getDay()); ?>曜日</span>
                            </span>
                        </h3>
                        <?php get_module_reserve_button(); ?>
                    </section>
                </div>
            </main>
            <?php get_footer(); ?>
        </body>
    </html>
<?php else: ?>
    <?php
        get_class_url();
        $reserve = new URL(['page', 'reserve']);
        header('Location: ' . $reserve->get_file(''));
    ?>
<?php endif; ?>