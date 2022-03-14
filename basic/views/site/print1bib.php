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
//$model=Bibdistribusi::find()->where(['id_profile'=>Yii::$app->user->identity->id_profile])->all();

$this->title = 'Laporan Rekapitulasi';
?>
<div class="site-index">
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
			$distribusi = Yii::$app->db->createCommand("select sum(dosis) as jml from bib_distribusi where id_profile=".Yii::$app->user->identity->id_profile." and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and sni='".$key['sni']."' and sexing='".$key2['sexing']."'")->queryScalar();
			$jumlahawal = Yii::$app->db->createCommand("select jumlah as jml from ternak_semen where id_profile=".Yii::$app->user->identity->id_profile. " and sexing='".$key2['sexing']."' and no_earthtag in (select no_earthtag from individu_ternak_bib where id_profile=".
							Yii::$app->user->identity->id_profile." and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."' and sni='".$key['sni']."') order by id limit 1")->queryScalar();

			?>
        	<tr>		  
		  	<td><?php echo $key['jenis'] ?></td>
			<td><?php echo $key['rumpun'] ?></td>
			<td><?php echo $key2['sexing']?></td>
			<td><?php echo $key['sni'] ?></td>
			<td><?php echo $jumlahawal; ?></td>
			<td><?php echo $jumlah; ?></td>
			<td><?php echo $distribusi; ?></td>
			<td><?php echo $jumlah-$distribusi; ?></td>
			
			</tr>


		  <?php }
			}
		  ?>






        </table>


    </div>
   <script>
window.print();
</script>


    <div class="body-content">

        
    </div>
</div>
