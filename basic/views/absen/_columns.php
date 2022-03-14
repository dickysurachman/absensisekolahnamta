<?php
use yii\helpers\Url;
$st=['Hadir','Sakit','Izin','Alpa'];
use kartik\grid\GridView;

return [
    
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
     [
    'class' => 'kartik\grid\ExpandRowColumn',
    'width' => '50px',
    'header' => '<span class="glyphicon glyphicon-eye-open"></span>',
    'value' => function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail' => function ($model, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('viewte', ['model' => $model]);
    },
    'headerOptions' => ['class' => 'kartik-sheet-style'] ,
    'expandOneOnly' => true
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nama',
        'value'=>'siswa.nama'
    ],    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kelas',
        'value'=>'siswa.kelas'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tanggal',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'add_date',
        'value'=>'jam',
    ],
  
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'value'=>'as',
        'filter'=>$st,
    ],
    

];   