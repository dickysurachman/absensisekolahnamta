<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Kandang */
/* @var $form yii\widgets\ActiveForm */
$model->id_profile=Yii::$app->user->identity->id_profile;
$tipe=["Kandang Donor"=>"Kandang Donor",
"Kandang Resipien"=>"Kandang Resipien",
"Kandang Rearing"=>"Kandang Rearing",
"Kandang Pejantan"=>"Kandang Pejantan",
"Kandang Isolasi"=>"Kandang Isolasi",
"Kandang Melahirkan"=>"Kandang Melahirkan",
"Kandang Afkir"=>"Kandang Afkir",
"Kandang Pedet"=>"Kandang Pedet",
"Kandang Karantina"=>"Kandang Karantina"
];

?>

<div class="kandang-form">

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
