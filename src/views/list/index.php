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
    }
?>
<?php foreach ($records as $record) : ?>
    <div>
        <hr>
        <div>
            <span>日付: <?php echo $record['recording_date'] ?></span>
        </div>
        <div>
            <span>体調: <?php echo $record['physical_condition'] ?></span>
        </div>
        <div>
            <span>気分: <?php echo statusMessage($record['mood_state']) ?></span>
        </div>
        <div>
            <span>腰痛: <?php echo statusMessage($record['back_pain']) ?></span>
        </div>
        <div>
            <span>目の疲れ: <?php echo statusMessage($record['eyestrain']) ?></span>
        </div>
        <div>
            <span>頭痛: <?php echo statusMessage($record['headache'] )?></span>
        </div>
    </div>
<?php endforeach; ?>
