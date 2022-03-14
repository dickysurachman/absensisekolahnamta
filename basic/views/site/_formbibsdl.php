<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bibsdl */
/* @var $form yii\widgets\ActiveForm */
$tipe=["Rumput"=>"Rumput",
"Legum"=>"Legum",
]
?>

<div class="bibsdl-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'jenis')->dropDownList($tipe,array('prompt'=>'Silahkan Pilih'))  ?>

    
    <?= $form->field($model, 'luasan')->textInput() ?>

    <?= $form->field($model, 'produksi')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
