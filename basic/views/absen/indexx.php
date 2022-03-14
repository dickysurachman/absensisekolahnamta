<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\web\View;
use app\models\Absen;
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
        //'method' => 'post',
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

    <?php echo $form->field($model, 'kelas') ?>

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
    <div class="table-responsive" style="overflow-x: auto;">
    <table id="tablex" class="kv-grid-table table table-bordered table-striped table-condensed">
                <tr>
                <th>No. </th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <?php
                if($tgl_a<>"" and $tgl_b<>""){

                $jumlahhari=(strtotime($tgl_b)-strtotime($tgl_a))/86400;
                for($i=0;$i<=$jumlahhari;$i++){
                $tgljn=date('d',strtotime($tgl_a)+(86400*$i));
                echo "<th>".$tgljn."</th>";
                }
                } 
                ?>
                </tr>
<?php
            $k=1;
            if($tracking<>""){
            foreach ($tracking as $key) {
                echo "<tr><td>".$k."</td><td>".$key->nama."</td><td>".$key->kelas."</td>";
                if($tgl_a<>"" and $tgl_b<>""){
                $jumlahhari=(strtotime($tgl_b)-strtotime($tgl_a))/86400;
                for($i=0;$i<=$jumlahhari;$i++){
                    $tgls=date('Y-m-d',strtotime($tgl_a)+(86400*$i));
                    $cari=Absen::findOne(['id_siswa'=>$key->id,'tanggal'=>$tgls]);
                    if(isset($cari)){
                        echo "<td>".$cari->as."</td>";
                    } else {
                        echo "<td><span class='glyphicon glyphicon-remove' style='color:red;'></span></td>";
                    }
                //$tgljn=date('d-m',strtotime($tgl_a)+(86400*$i));
                }
                } 
                echo "</tr>";
                $k++;
            }
            }

?>
</table>
</div>
</div>