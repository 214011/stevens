<?php
    $time = [
        '9',
        '10',
        '11',
        '12',
        '13',
        '14',
        '15',
        '16'
    ];
?>
<ul class="reserve__today--container">
    <?php foreach ($time as $t): ?>
        <li class="reserve__today--container_item">
            <dl>
                <dt><?php echo $t ?>:00~</dt>
                <dd>
                    <dl>
                        <dt>空き</dt>
                        <dd>4人</dd>
                    </dl>
                </dd>
                <dd><button type="button" class="btn" onclick="location.href = '#'">予約する</button></dd>
            </dl>
        </li>
    <?php endforeach; ?>
</ul>