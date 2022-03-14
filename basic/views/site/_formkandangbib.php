<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kandangbib */
/* @var $form yii\widgets\ActiveForm */

$tipe=["KANDANG KARANTINA"=>"KANDANG KARANTINA",
"KANDANG ISOLASI"=>"KANDANG ISOLASI",
"KANDANG PEJANTAN"=>"KANDANG PEJANTAN"
]
?>

<div class="kandangbib-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'jenis')->dropDownList($tipe,array('prompt'=>'Silahkan Pilih'))  ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'kapasitas')->textInput() ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
