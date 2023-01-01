<?php if (isset($errors)) : ?>
    <ul>
    <?php foreach ($errors as $error) : ?>
        <li class="text-danger"><?php echo $error ?></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p>情報を入力してください</p>
<small>(体調以外は「2:とても良い,1:良い,0:異常なし,-1:違和感あり,-2:悪い」で入力）</small>

<form action="/register/create" method="post" class="mt-2">
<div class="mb-2 row justify-content-start align-items-center">
    <label class="form-label col-sm-2">日付: </label>
    <div class="col-sm-10"><input type="date" class="form-control" name="recording_date" value="<?php echo date('Y-m-d') ?>"></div>
</div>
<div class="mb-2 row justify-content-start align-items-center">
    <label class="form-label col-sm-4 text-nowrap">体調(0~100点): </label>
    <div class="col-sm-8">

        <input type="number" name="physical_condition" class="form-control" min="0" max="100" value="50">
    </div>
</div>
<div class="mb-2 row justify-content-start align-items-center">
    <label class="form-label  col-sm-2 text-nowrap">気分: </label>
    <div class="col-sm-10">
    <input type="number" name="mood_state" class="form-control" min="-2" max="2" value="0">
    </div>
</div>
<div class="mb-2 row justify-content-start align-items-center">
    <label class="form-label col-sm-2 text-nowrap">腰痛: </label>
    <div class="col-sm-10">
    <input type="number" name="back_pain" class="form-control" min="-2" max="2" value="0">
    </div>
</div>
<div class="mb-2 row justify-content-start align-items-center">
    <label class="form-label  col-sm-3 text-nowrap">目の疲れ: </label>
    <div class="col-sm-9">
    <input type="number" name="eyestrain" class="form-control" min="-2" max="2" value="0">

</div>
    </div>
<div class="mb-2 row justify-content-start align-items-center">
    <label class="form-label col-sm-2 text-nowrap">頭痛: </label>
    <div class="col-sm-10">
    <input type="number" name="headache" class="form-control" min="-2" max="2" value="0">
    </div>
</div>
<button type="submit" class="btn btn-primary btn-sm mb-2">登録する</button>
</form>
