<?php 
use yii\helpers\Html;
use app\models\Bibdistribusi;


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
/*$jantanp = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where status_ternak<>'bibit' and jenis_kelamin='Jantan' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
$jantand = Yii::$app->db->createCommand("select count(id) as jml from ternak_mutasi_out where jenis_kelamin='Jantan' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
$betinap = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where status_ternak<>'bibit' and jenis_kelamin='Betina' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
$betinad = Yii::$app->db->createCommand("select count(id) as jml  from ternak_mutasi_out where jenis_kelamin='Betina' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
$betina = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where jenis_kelamin='Betina' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
$jantan = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where jenis_kelamin='Jantan' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
$bakalan = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where status_ternak='bakalan' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
$indukan = Yii::$app->db->createCommand("select count(id) as jml from individu_ternak where status_ternak='indukan' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
*/
//$model=Bibdistribusi::find()->where(['id_profile'=>Yii::$app->user->identity->id_profile])->all();
$this->title = 'Laporan Summary';
?>
<div class="site-index">
	<?= Html::a('<span class=\'fa fa-print\' aria-hidden=\'true\'></span> Cetak', ['bibprint'], ['class' => 'btn btn-primary','target'=>'_blank']) ?>
    <div class="jumbotron">
    	        <br/>
        
    	
  		<h3>Laporan Distribusi Semen Beku</h3>
	 <table class="table table-bordered">
        <tr>
		  <td colspan="3"><b>Jenis Semen Beku</b></td>
		  <td rowspan="2"><b>Sertifikat</b></td>
		  <td rowspan="2"><b>Stok Awal (dosis)</b></td>
		  <td rowspan="2"><b>Produksi (dosis)</b></td>
		  <td rowspan="2"><b>Distribusi (dosis)</b></td>
		  <td rowspan="2"><b>Sisa Stok (dosis)</b></td>
		</tr>
        <tr>
		  <td><b>Komoditas</b></td>
		  <td><b>Rumpun</b></td>
		  <td><b>Sexing / Non Sexing</b></td>
		 </tr>

		  <?php 
		  $model=Yii::$app->db->createCommand('Select jenis,rumpun,sni from individu_ternak_bib where id_profile='.Yii::$app->user->identity->id_profile.' group by jenis,rumpun,sni')->queryAll();
		  
		  foreach ($model as $key ) {
			$model2=Yii::$app->db->createCommand("select sexing from ternak_semen where id_profile=".
				Yii::$app->user->identity->id_profile." and no_earthtag in (select no_earthtag from individu_ternak_bib where id_profile=".
				Yii::$app->user->identity->id_profile." and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and sni='".$key['sni']."') group by sexing")->queryAll();
			foreach ($model2 as $key2) {
			$jumlah = Yii::$app->db->createCommand("select sum(jumlah) as jml from ternak_semen where id_profile=".Yii::$app->user->identity->id_profile. " and sexing='".$key2['sexing']."' and no_earthtag in (select no_earthtag from individu_ternak_bib where id_profile=".
				Yii::$app->user->identity->id_profile." and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and sni='".$key['sni']."')")->queryScalar();
			$jumlahawal = Yii::$app->db->createCommand("select jumlah as jml from ternak_semen where id_profile=".Yii::$app->user->identity->id_profile. " and sexing='".$key2['sexing']."' and no_earthtag in (select no_earthtag from individu_ternak_bib where id_profile=".
				Yii::$app->user->identity->id_profile." and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and sni='".$key['sni']."') order by id limit 1")->queryScalar();
			$distribusi = Yii::$app->db->createCommand("select sum(dosis) as jml from bib_distribusi where id_profile=".Yii::$app->user->identity->id_profile." and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and sni='".$key['sni']."' and sexing='".$key2['sexing']."'")->queryScalar();
			?>
        	<tr>		  
		  	<td><?php echo $key['jenis'] ?></td>
			<td><?php echo $key['rumpun'] ?></td>
			<td><?php echo $key2['sexing']?></td>
			<td><?php echo $key['sni'] ?></td>
			<td><?php echo $jumlahawal; ?></td>
			<td><?php echo $jumlah; ?></td>
			<td><?php echo $distribusi; ?></td>
			<td><?php echo $jumlah-$distribusi ?></td>
			
			</tr>


		  <?php }
			}
		  ?>




        </table>

    </div>

    <div class="body-content">

        
    </div>
</div>
