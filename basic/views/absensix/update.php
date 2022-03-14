<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Absen */

$this->title = 'Update Absen: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Absens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'id_siswa' => $model->id_siswa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
