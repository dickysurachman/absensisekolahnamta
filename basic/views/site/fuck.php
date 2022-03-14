<?php
use app\models\Profile;

/* @var $this yii\web\View */

$this->title = 'Sistem Online ';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Selamat datang  <?php echo Yii::$app->user->identity->username?></h2>

        <p class="lead"></p>

        <p><a class="btn btn-lg btn-success" href="#">Get started </a></p>
        <?php 
        //$hutel=[];

        /*$customers = Profile::find()
					    ->asArray()
					    ->all();*/
		foreach (Profile::find()->all() as $customers) {
		//foreach ($costumers as $key) {
		//foreach ($costumers as $key) {
				$hutel[]=['location'=>['address'=>$customers->map],'htmlContent'=>'<h3>'.$customers->nama.'</h3>'];
		}
		
		echo yii2mod\google\maps\markers\GoogleMaps::widget([
			'userLocations'=>$hutel
			]);
		/*echo yii2mod\google\maps\markers\GoogleMaps::widget([
		    'userLocations' => [
		        [
		            'location' => [
		                'address' => 'Jakarta Convention Center, Jalan Gelora 8, Gelora, Central Jakarta City, Jakarta, Indonesia',
		               // 'country' => 'indonesia',
		            ],
		            'htmlContent' => '<h1>Data Statistik </h1>',
		        ],
		        [
		            'location' => [
		                'city' => 'Surabaya',
		                //'country' => 'United States',
		            ],
		            'htmlContent' => '<h1>Data Statistik 2</h1>',
		        ],
		    ],
		]);*/

        ?>
    </div>

    <div class="body-content">

        
    </div>
</div>
