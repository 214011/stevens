<?php
    require_once(__DIR__ . '/utility_functions.php');
    get_class_url();
    get_class_mydate();
    $dbh = get_module_dbh_instance();
    date_default_timezone_set('Asia/Tokyo');

    $hourTime = ['9', '10', '11', '12', '13', '14', '15', '16'];
    $reserve = new URL(['page', 'reserve']);
?>
<ul class="reserve__today--container">
    <?php foreach ($hourTime as $t): ?>
        <li class="reserve__today--container_item">
            <dl>
                <dt><?php echo $t ?>:00~</dt>
                <dd>
                    <dl>
                        <dt>空き</dt>
                        <dd>4人</dd>
                    </dl>
                </dd>
                <?php if (isset($_GET['date'])): ?>
                    <?php
                        $reqDate = new DateTime($_GET['date'] . ' ' . $t . ':00:00');
                    ?>
                    <dd><button type="button" class="btn" onclick="location.href = '<?php echo $reserve->get_file('process.php') ?>?datetime=<?php echo $reqDate->format('Y-m-d H:i:s'); ?>'">予約する</button></dd>
                <?php else: ?>
                    <?php
                        $today = new DateTime('now' . ' ' . $t . ':00:00');
                    ?>
                    <dd><button type="button" class="btn" onclick="location.href = '<?php echo $reserve->get_file('process.php') ?>?datetime=<?php echo $today->format('Y-m-d H:i:s'); ?>'">予約する</button></dd>
                <?php endif; ?>
            </dl>
        </li>
    <?php endforeach; ?>
</ul>