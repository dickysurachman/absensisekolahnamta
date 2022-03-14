<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\Url;
//use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
?>
<div class="profile-view">

    
    <p>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nama',
            'alamat:ntext',
            'telp',
            'fax',
            'jml_shelter',
            'luas_shelter',
            'dt_shelter',

//            'shelter',
            'map:ntext',
        ],
    ]) ?>
        <div class="kandang-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable2',
            'dataProvider' => $dataProvider3,
            'filterModel' => false,
            //'enableSorting' => false,
            //'sort'=>false,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columnsbibsdm2.php'), 
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
        ])?>
    </div>
</div>
<div class="kandang-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable3',
            'dataProvider' => $dataProvider4,
            'filterModel' => false,
            'toolbar'=>false,
            //'enableSorting' => false,
            //'sort'=>false,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columnsbibsdl2.php'), 
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
        ])?>
    </div>
</div>

    <div class="kandang-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => false,
            //'enableSorting' => false,
            //'sort'=>false,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columnsa.php'), 
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
        ])?>
    </div>
</div>


<div class="padang-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable2',
            'dataProvider' => $dataProvider2,
            'filterModel' => false,
            //'sort'=>false,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns2a.php'),
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
        ])?>
    </div>
</div>



<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

</div>