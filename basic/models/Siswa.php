<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property int $status
 * @property string $kelas
 *
 * @property Absen[] $absens
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['nik'], 'string', 'max' => 16],
            [['nama'], 'string', 'max' => 200],
            [['kelas'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'status' => 'Status',
            'kelas' => 'Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbsens()
    {
        return $this->hasMany(Absen::className(), ['id_siswa' => 'id']);
    }
}
