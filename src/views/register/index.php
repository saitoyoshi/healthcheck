<?php if (isset($errors)) : ?>
    <ul>
    <?php foreach ($errors as $error) : ?>
        <li><?php echo $error ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p>情報を入力してください</p>
<form action="/register/create" method="post">
<div>
    <span>日付: </span>
    <input type="date" name="recording_date" value="<?php echo date('Y-m-d') ?>">
</div>
<div>
    <span>体調: </span>
    <input type="number" name="physical_condition" min="0" max="100" value="50">
</div>
<div>
    <span>気分: </span>
    <input type="number" name="mood_state" min="-2" max="2" value="0">
</div>
<div>
    <span>腰痛: </span>
    <input type="number" name="back_pain" min="-2" max="2" value="0">
</div>
<div>
    <span>目の疲れ: </span>
    <input type="number" name="eyestrain" min="-2" max="2" value="0">
</div>
<div>
    <span>頭痛: </span>
    <input type="number" name="headache" min="-2" max="2" value="0">
</div>
<button type="submit">登録する</button>
</form>
