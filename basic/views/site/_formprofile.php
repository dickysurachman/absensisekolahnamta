<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

use kartik\file\FileInput;
// or 'use kartikile\FileInput' if you have only installed yii2-widget-fileinput in isolation
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Userprofile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userprofile-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'gambar')->fileInput() ?>
    <?php
    if(Yii::$app->user->identity->foto<>""){
    $images=Yii::$app->homeUrl."/images/".Yii::$app->user->identity->foto;
   echo $form->field($model, 'gambar')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*', 'multiple'=>true],
     'pluginOptions' => [
        'initialPreview'=>[
			$images
        ],
        'initialPreviewAsData'=>true,
        //'initialCaption'=>"The Moon and the Earth",
        /*'initialPreviewConfig' => [
            ['caption' => 'Moon.jpg', 'size' => '873727'],
            ['caption' => 'Earth.jpg', 'size' => '1287883'],
        ],
        'overwriteInitial'=>false,
        'maxFileSize'=>2800*/
         'maxFile'=>2,
    ]
	]);
    } else {
    	
    echo $form->field($model, 'gambar')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
     'pluginOptions' => [
        'maxFile'=>5,
    ]
    ]); 
    }
     ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
