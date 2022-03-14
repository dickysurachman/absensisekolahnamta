<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$tipe=[
"PADOCK KARANTINA"=>"PADOCK KARANTINA",
"PADOCK MELAHIRKAN"=>"PADOCK MELAHIRKAN",
"PADOCK REARING"=>"PADOCK REARING",
"PADOCK PEJANTAN"=>"PADOCK PEJANTAN",
"PADOCK INDUK"=>"PADOCK INDUK",
"PADOCK DARA"=>"PADOCK DARA",


]

/* @var $this yii\web\View */
/* @var $model app\models\Padang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="padang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis')->dropDownList($tipe,array('prompt'=>'Silahkan Pilih'))   ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'luasan')->textInput() ?>

    <?= $form->field($model, 'daya_tampung')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
