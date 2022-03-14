

<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
?>
<div class="company-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'siswa.nama',
            [
                'attribute' => 'foto',
                'value'=>Yii::$app->homeUrl.'images/absen/' .$model->foto,
                'format' => ['image',['class'=>'img-responsive']],
              ],
//            'logo_1:image',
//            'logo2:image',
//            'logo3:image',
  //          'status',
            //'logo_1',
            //'logo_2',
            //'logo_3',
//            'urutresi',
        ],
    ]) ?>

</div>
