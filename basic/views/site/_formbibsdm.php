<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bibsdm */
/* @var $form yii\widgets\ActiveForm */
$tipe=[
"Fungsional Umum"=>"Fungsional Umum",
"Medik"=>"Medik",
"Non PNS"=>"Non PNS",
"Para Medik"=>"Para Medik",
"Struktural"=>"Struktural",
"Wasbitnak"=>"Wasbitnak",
"Wastukan"=>"Wastukan",
]
?>

<div class="bibsdm-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'jenis')->dropDownList($tipe,array('prompt'=>'Silahkan Pilih'))  ?>


    <?= $form->field($model, 'jumlah')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
