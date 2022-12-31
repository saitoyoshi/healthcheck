<?php if (isset($errors)) : ?>
    <ul>
    <?php foreach ($errors as $error) : ?>
        <li><?php echo $error ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p>情報を入力してください</p>
<div>
    <span>日付: </span>
    <input type="date" name="recording_date" value="<?php echo date('Y-m-d') ?>">
</div>
<div>
    <span>体調: </span>
    <input type="number" name="physical_condition">
</div>
<div>
    <span>気分: </span>
    <input type="number" name="mood_state">
</div>
<div>
    <span>腰痛: </span>
    <input type="number" name="back_pain">
</div>
<div>
    <span>目の疲れ: </span>
    <input type="number" name="eyestrain">
</div>
<div>
    <span>頭痛: </span>
    <input type="number" name="headache">
</div>
