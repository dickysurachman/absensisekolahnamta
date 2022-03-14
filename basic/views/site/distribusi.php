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
	<?= Html::a('<span class=\'fa fa-print\' aria-hidden=\'true\'></span> Cetak', ['distribusip'], ['class' => 'btn btn-primary','target'=>'_blank']) ?>
    <div class="jumbotron">
    	        <br/>
        
  
    	 <h3>Laporan Distribusi</h3>
        <table class="table table-bordered">
        <tr>
		  <td rowspan="2"><b>Jenis Ternak</b></td>
		  <td rowspan="2"><b>Rumpun</b></td>
		  <td colspan="2"><b>Jumlah Distribusi Hibah</b></td>
		  <td colspan="2"><b>Jumlah Distribusi Afkir</b></td>
		  <td colspan="2"><b>Jumlah Distribusi Jual Langsung</b></td>
		</tr>
        <tr>
		  <td>Jantan</td>
		  <td>Betina</td>
		  <td>Jantan</td>
		  <td>Betina</td>
		  <td>Jantan</td>
		  <td>Betina</td>
		 </tr>

		  <?php 
		  $haris=Yii::$app->db->createCommand("select b.jenis,b.rumpun from ternak_mutasi_out a join individu_ternak 
		  	b on a.no_earthtag=b.no_earthtag where a.id_profile="
		  	.Yii::$app->user->identity->id_profile." group by b.jenis,b.rumpun")->queryAll();
		  foreach ($haris as $key ) {
			$jantand = Yii::$app->db->createCommand("select count(id) as jml from ternak_mutasi_out where  no_earthtag in (select no_earthtag from individu_ternak where jenis_kelamin='Jantan' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and jenis_out='Afkir' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$jantanh = Yii::$app->db->createCommand("select count(id) as jml from ternak_mutasi_out where  no_earthtag in (select no_earthtag from individu_ternak where jenis_kelamin='Jantan' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and jenis_out='Hibah' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$jantanj = Yii::$app->db->createCommand("select count(id) as jml from ternak_mutasi_out where  no_earthtag in (select no_earthtag from individu_ternak where jenis_kelamin='Jantan' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and jenis_out='Jual Langsung' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$betinad = Yii::$app->db->createCommand("select count(id) as jml  from ternak_mutasi_out where  no_earthtag  in (select no_earthtag from individu_ternak where jenis_kelamin='Betina' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and jenis_out='Afkir' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$betinah = Yii::$app->db->createCommand("select count(id) as jml  from ternak_mutasi_out where  no_earthtag  in (select no_earthtag from individu_ternak where jenis_kelamin='Betina' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and jenis_out='Hibah' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			$betinaj= Yii::$app->db->createCommand("select count(id) as jml  from ternak_mutasi_out where  no_earthtag  in (select no_earthtag from individu_ternak where jenis_kelamin='Betina' and jenis='".$key['jenis']."' and rumpun='".$key['rumpun']."') and jenis_out='Jual Langsung' and id_profile=".Yii::$app->user->identity->id_profile)->queryScalar();
			?>
        	<tr>		  
			<td><?php echo $key['jenis'] ?></td>
		  	<td><?php echo $key['rumpun'] ?></td>
			<td><?php echo $jantanh ?></td>
			<td><?php echo $betinah ?></td>
			<td><?php echo $jantand ?></td>
			<td><?php echo $betinad ?></td>
			<td><?php echo $jantanj?></td>
			<td><?php echo $betinaj?></td>
		 </tr>


		  <?php }
		  ?>




        </table>

    </div>

    <div class="body-content">

        
    </div>
</div>
