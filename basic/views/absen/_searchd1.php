<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\web\View;

$script = <<< JS
$("#reservasisearch-tgl_a").datepicker({
    changeMonth: true, 
    changeYear: true, 
    dateFormat:'yy-mm-dd',
}); 
$("#reservasisearch-tgl_b").datepicker({
    changeMonth: true, 
    changeYear: true, 
    dateFormat:'yy-mm-dd',
}); 
JS;
$position= View::POS_END;
$this->registerJs($script,$position);

/* @var $this yii\web\View */
/* @var $model app\models\ReservasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservasi-search">

    <?php $form = ActiveForm::begin([
        //'action' => ['absen'],
        'method' => 'get',
    ]); ?>
    <div class="col-md-6" style="margin-bottom:15px;padding-left:0px !important;">
    <label>Dari Tanggal</label>
    <?php
    echo DatePicker::widget([
    'model'  => $model,
    'attribute'=>'tgl_a',
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
    'options'=>['class'=>'form-control','readonly'=>'readonly'
    //'dateFormat'=>'yy-mm-dd',
    ]]);
    ?>
    </div>
    <div class="col-md-6" style="margin-bottom:15px;padding-right:0px !important;">
        <label>Sampai</label>
    <?php 
    echo DatePicker::widget([
    'model'  => $model,
    'attribute'=>'tgl_b',
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
    'options'=>['class'=>'form-control','readonly'=>'readonly'
    //'dateFormat'=>'yy-mm-dd',
    ]]);
    ?></div>

    <?php // echo $form->field($model, 'no_kamar') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'tgl_booking') ?>

    <?php // echo $form->field($model, 'tgl_cekin') ?>

    <?php // echo $form->field($model, 'tgl_cekout') ?>

    <?php // echo $form->field($model, 'dp') ?>

    <?php // echo $form->field($model, 'bayar') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
