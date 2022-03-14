<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Absen */
?>
<div class="absen-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_siswa',
            'tanggal',
            'add_date',
            'foto',
            'status',
        ],
    ]) ?>

</div>
