<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absen".
 *
 * @property int $id
 * @property int $id_siswa
 * @property string $tanggal
 * @property string $add_date
 * @property string $foto
 * @property int $status
 *
 * @property Siswa $siswa
 */
class Absen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_siswa'], 'required'],
            [['id_siswa', 'status'], 'integer'],
            [['tanggal', 'add_date'], 'safe'],
            [['foto'],'file','maxSize'=>1512000], 
            [['foto'], 'file', 'extensions' => 'jpg,jpeg,png'],
            //[['foto'], 'string', 'max' => 250],
            [['id_siswa'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['id_siswa' => 'id']],
        ];
    }

    public function getAs(){
        //$st=['Hadir','Sakit','Izin','Alpa'];
        if($this->status==0){
            return 'Hadir';
        } elseif($this->status==1){
            return 'Sakit';

        }elseif($this->status==2){
            return 'Izin';
        
        }elseif($this->status==3){
            return 'Alpa';
        
        }
    }
    public function getJam(){
        return date('H:i:s',strtotime($this->add_date));
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_siswa' => 'Nama Siswa',
            'nama' => 'Nama Siswa',
            'kelas' => 'Kelas ',
            'tanggal' => 'Tanggal',
            'add_date' => 'Jam Absen',
            'foto' => 'Foto',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasOne(Siswa::className(), ['id' => 'id_siswa']);
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Place your custom code here
            if($this->isNewRecord)
            {                    
                        $this->add_date = date('Y-m-d H:i:s',time());
                        $this->tanggal = date('Y-m-d',time());
            }
                    else
            {
                        //$this->edit_who =Yii::$app->user->identity->username;
                        //$this->edit_date =  date('Y-m-d H:i:s',time());
            }
            return true;
        } else {
            return false;
        }
    }
}
