<?php

function statusMessage(int $statuNumber): string
{
    if ($statuNumber === 2) {
        return 'とても良い';
    } elseif ($statuNumber === 1) {
        return '良い';
    } elseif ($statuNumber === 0) {
        return '異常なし';
    } elseif ($statuNumber === -1) {
        return '違和感あり';
    } elseif ($statuNumber === -2) {
        return '悪い';
    }
    return '不正な値が指定されました';
}
?>
    <a class="btn btn-primary btn-sm mb-1" href="/register">記録をつける</a>
    <div class="row justify-content-around">
<?php foreach ($records as $record) : ?>
    <div class="card border-info border-1 my-1 col-md-6 col-lg-4 bg-success text-center">
        <div class="card-body">
            <div class="card-title">日付: <?php echo date('Y/n/j', strtotime($record['recording_date'])) ?></div>
            <ul class="list-group list-group-flush list-unstyled">
                <li class="list-list-group-item">体調: <?php echo $record['physical_condition'] ?></li>
                <li class="list-list-group-item">気分: <?php echo statusMessage($record['mood_state']) ?></li>
                <li class="list-list-group-item">腰痛: <?php echo statusMessage($record['back_pain']) ?></li>
                <li class="list-list-group-item">目の疲れ: <?php echo statusMessage($record['eyestrain']) ?></li>
                <li class="list-list-group-item">頭痛: <?php echo statusMessage($record['headache'])?></li>
            </ul>
        </div>
    </div>
<?php endforeach; ?>
</div>
