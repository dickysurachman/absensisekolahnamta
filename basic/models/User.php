<?php

namespace app\models;

use Yii;
use app\models\Profile;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $tipe_user
 * @property integer $id_profile
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'id_profile'], 'required'],
            [['status', 'created_at', 'updated_at', 'tipe_user', 'id_profile','delete'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function getTipeuser(){
        $nama=$this->tipe_user;
        if($nama==0){
            return "Administrator";
        }else if ($nama==1){
            return "Front Office";
        }else if ($nama==2){
            return "Housekeeping";
        }else if ($nama==3){
            return "FB Outlet";
        }else if ($nama==4){
            return "Akunting";
        }
    }

    public function getProfile(){
         //$hh=User::findOne($this->id_user);
        $nama=Profile::findOne($this->id_profile);
        if(isset($nama)){
            return $nama->nama;
        }else{
            return "";
        }   


    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'delete' => 'Hapus Data',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'tipe_user' => 'Tipe User',
            'id_profile' => 'Outlet',
            'tipeuser' => 'Tipe User',
            'profile' => 'Nama Outlet',
        ];
    }
}
