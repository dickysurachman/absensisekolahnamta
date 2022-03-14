<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jenis',
        'enableSorting' => false,
                        'headerOptions' => [
                    'rowspan' => '2',
                        ]
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jumlah',
        'enableSorting' => false,   
                        'headerOptions' => [
                    'rowspan' => '2',
                        ]     
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kapasitas',
        'enableSorting' => false,
                        'headerOptions' => [
                    'rowspan' => '2',
                        ]
    ],
    

];   