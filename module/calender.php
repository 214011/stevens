<?php
    require_once(__DIR__ . '/../lib/url.php');
    require_once(__DIR__ . '/../lib/mydate.php');
    date_default_timezone_set('Asia/Tokyo');

    $month = [
        [
            'firstDay' => new MyDate(MyDate::FIRST_DAY),
            'lastDay' => new MyDate(MyDate::LAST_DAY),
        ],
        [
            'firstDay' => new MyDate(MyDate::NEXT_MONTH_FIRST_DAY),
            'lastDay' => new MyDate(MyDate::NEXT_MONTH_LAST_DAY),
        ]
    ];

    $reserve_day = new URL(['page', 'reserve', 'day']);
?>
<?php foreach ($month as $m): ?>
    <section class="calender--container__item">
        <h3 class="calender--container__item--title"><?php echo $m['firstDay']->getMonth(); ?>月</h3>
        <div class="calender--container__item--table">
            <table>
                <thead>
                    <tr>
                    <?php $day = 0; ?>
                        <?php while ($day < count(MyDate::WEEK)): ?>
                            <th><?php echo MyDate::ja_week_format($day); ?></th>
                            <?php $day++ ?>
                        <?php endwhile; ?>
                    </tr>
                </thead>
                <tbody class="js-reserve__calender">
                    <?php $day_count = 0; ?>
                    <?php $r = 0; ?>
                    <?php while ($r < 6): ?>
                        <tr>
                        <?php $c = 0; ?>
                        <?php while ($c < 7): ?>
                            <?php if ($r === 0 && $c < $m['firstDay']->getDay()): ?>
                                <td></td>
                            <?php elseif ($r === 0 && $c >= $m['firstDay']->getDay()): ?>
                                <?php $day_count++; ?>
                                <td><a href="reserve_day.html"><?php echo $day_count; ?></a></td>
                            <?php elseif ($day_count < $m['lastDay']->getDate()): ?>
                                <?php $day_count++; ?>
                                <td><a href="reserve_day.html"><?php echo $day_count; ?></a></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <?php $c++; ?>
                        <?php endwhile; ?>
                        </tr>
                        <?php $r++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
<?php endforeach; ?>
