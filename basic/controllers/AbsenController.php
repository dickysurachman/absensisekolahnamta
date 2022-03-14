<?php

namespace app\controllers;

use yii\web\UploadedFile;
use Yii;
use app\models\Absen;
use app\models\Siswa;
use app\models\AbsenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AbsenController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model=New Absen();
        $this->layout="mainp";
         if ($model->load(Yii::$app->request->post()) ) {
         	 $model->foto = UploadedFile::getInstance($model, 'foto');
                if(isset($model->foto)){
                $namafile=rand(1000, 99999999);
                $file1= $namafile . '.' . $model->foto->extension;
                $model->foto->saveAs('images/absen/' . $namafile . '.' . $model->foto->extension,TRUE);
                $model->foto=$file1;
                }
            $model->save();
             \Yii::$app->session->setFlash('error', 'Data Berhasil diinput');
            //return $this->redirect(['view', 'id' => $model->id, 'id_siswa' => $model->id_siswa]);
        }

        return $this->render('form', [
            'model' => $model,
        ]);
//        return $this->render('form');
    }
    public function actionLaporan()
    {
        $this->layout="mainp";
        $searchModel = new AbsenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        //return $this->render('index');
    }
    public function actionLaporan2()
    {
        $this->layout="mainp";
        $model = new AbsenSearch();
        $tracking="";
        $tgl_a="";
        $tgl_b="";
        if ($model->load(Yii::$app->request->post()) ) {
            $tracking=Siswa::find()->where(['kelas'=>$model->kelas])->All();
            $tgl_a=$model->tgl_a;
            $tgl_b=$model->tgl_b;

        }
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexx', [
            'model'=>$model,
            'tracking'=>$tracking,
            'tgl_a'=>$tgl_a,
            'tgl_b'=>$tgl_b,
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
        //return $this->render('index');
    }

}
