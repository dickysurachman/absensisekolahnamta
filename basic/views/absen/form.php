<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use kartik\select2\Select2;
use kartik\file\FileInput;
use app\models\Siswa;
use yii\helpers\ArrayHelper;

$st=['Hadir','Sakit','Izin','Alpa'];
/* @var $this yii\web\View */
/* @var $model app\models\Absen */
/* @var $form yii\widgets\ActiveForm */
$script = <<< JS
$(document).ready(function() {
      update();   
      setInterval(update,1000);
    });
    function update() {
      $.ajax({
        type: 'POST',
        url: '/time.php',
        success: function(data) {
          $("#servertime").html(data); 
          
        }
      });
    }
JS;
$position= View::POS_END;
$this->registerJs($script,$position);
?>
<div class="absen-form">
<h2><span id="servertime"></span></h2>
    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'id_siswa')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Siswa::find()->all(), 'id', 'nama'),
    'options' => ['placeholder' => 'Select '],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
    ?>
    <?= $form->field($model, 'status')->dropDownlist($st) ?>

    <?php

     echo $form->field($model, 'foto')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
     'pluginOptions' => [
        'maxFile'=>5,
    ]
    ]); 
    
     ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
