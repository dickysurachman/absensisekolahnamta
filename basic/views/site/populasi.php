<?php 
use yii\helpers\Html;


?>
<style>
.table-bordered{
	border: 2px solid black;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
	border: 2px solid black;	
}
</style>
<?php
//use app\models\Profile;

/* @var $this yii\web\View */

//$huhu=Yii::$app->createComand()
$this->title = 'Sistem Online ';
?>
<div class="site-index">
	<?= Html::a('<span class=\'fa fa-print\' aria-hidden=\'true\'></span> Cetak', ['print1'], ['class' => 'btn btn-primary','target'=>'_blank']) ?>
    <div class="jumbotron">
    	        <br/>
        
    	

        <h3>Populasi</h3>
        <br/>
        <table class="table table-bordered">
        <tr>
	      <td rowspan="2"><b>Jenis Ternak</b></td>
		  <td rowspan="2"><b>Rumpun</b></td>
		  <td colspan="2"><b>Jumlah Aset Bibit</b></td>
		  <td colspan="2"><b>Jumlah Produksi</b></td>
		  <td colspan="2"><b>Jumlah Distribusi</b></td>
		  <td colspan="2"><b>Total Keseluruhan</b></td>
		</tr>
        <tr>
		  <td>Jantan</td>
		  <td>Betina</td>
		  <td>Jantan</td>
		  <td>Betina</td>
		  <td>Jantan</td>
		  <td>Betina</td>
		  <td>Jantan</td>
		  <td>Betina</td>
		 </tr>
		 <?php
		  $haris=Yii::$app->db->createCommand("select jenis,rumpun from individu_ternak where id_profile="
		  	.Yii::$app->user->identity->id_profile." group by jenis,rumpun")->queryAll();
		  foreach ($haris as $key ) {
			$jantanp = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where status_ternak<>'Bibit' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and jenis_kelamin='Jantan' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$jantand = Yii::$app->db->createCommand("select count(id) as jml from ternak_mutasi_out where no_earthtag in (select no_earthtag from individu_ternak where jenis_kelamin='Jantan' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$betinap = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where status_ternak<>'Bibit' and jenis_kelamin='Betina' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$betinad = Yii::$app->db->createCommand("select count(id) as jml  from ternak_mutasi_out where  no_earthtag in (select no_earthtag from individu_ternak where jenis_kelamin='Betina' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$betina = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where jenis_kelamin='Betina' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$jantan = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where jenis_kelamin='Jantan' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			?>

        <tr>
		  <td><?php echo $key['jenis'] ?></td>
		  <td><?php echo $key['rumpun'] ?></td>
		  <td><?php echo $jantan-$jantanp ?></td>
		  <td><?php echo $betina-$betinap ?></td>
		  <td><?php echo $jantanp?></td>
		  <td><?php echo $betinap ?></td>
		  <td><?php echo $jantand ?></td>
		  <td><?php echo $betinad ?></td>
		  <td><?php echo $jantan-$jantand?></td>
		  <td><?php echo $betina-$betinad?></td>
		 </tr>


			<?php
		  }		  
		 ?>



        </table>
    </div>

    <div class="body-content">

        
    </div>
</div>
