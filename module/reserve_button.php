<?php
    require_once(__DIR__ . '/utility_functions.php');
    get_class_url();
    get_class_mydate();
    $dbh = get_module_dbh_instance();
    get_module_search_reserver();
    date_default_timezone_set('Asia/Tokyo');

    $reserve = new URL(['page', 'reserve']);

    $reserve_info = [
        [
            'time' => '9',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 09:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ],
        [
            'time' => '10',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 10:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ],
        [
            'time' => '11',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 11:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ],
        [
            'time' => '12',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 12:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ],
        [
            'time' => '13',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 13:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ],
        [
            'time' => '14',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 14:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ],
        [
            'time' => '15',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 15:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ],
        [
            'time' => '16',
            'reserverLimit' => 4,
            'reserveDatetime' => new DateTime('now 16:00:00'),
            'href' => $reserve->get_file('process.php') . '?datetime='
        ]
    ];
    $i = 0;
    while ($i < count($reserve_info)) {
        if (isset($_GET['date'])) {
            $reserve_info[$i]['reserveDatetime'] = new DateTime($_GET['date'] . ' ' . $reserve_info[$i]['time'] . ':00:00');
        }
        $format_datetime = $reserve_info[$i]['reserveDatetime']->format('Y-m-d H:i:s');
        $reserve_info[$i]['reserverLimit'] -= search_reserver($dbh, $format_datetime);
        $reserve_info[$i]['href'] .= $format_datetime;
        $i++;
    }
?>
<ul class="reserve__today--container">
    <?php foreach ($reserve_info as $info): ?>
        <li class="reserve__today--container_item">
            <dl>
                <dt><?php echo $info['time'] ?>:00~</dt>
                <dd>
                    <dl>
                        <dt>空き</dt>
                        <dd><span data-js-ajax="<?php echo $info['reserveDatetime']->format('Y-m-d H:i:s') ?>"><?php echo $info['reserverLimit']; ?></span>人</dd>
                    </dl>
                </dd>
                <dd><button type="button" class="btn" onclick="location.href = '<?php echo $info['href']; ?>'">予約する</button></dd>
            </dl>
        </li>
    <?php endforeach; ?>
</ul>