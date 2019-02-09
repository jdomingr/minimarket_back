<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "systemuser".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $user_level
 */
class Systemuser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'systemuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'username', 'email', 'password', 'authKey', 'user_level'], 'required'],
            [['user_level'], 'string'],
            [['nombre', 'apellido', 'username', 'password', 'authKey'], 'string', 'max' => 250],
            [['email'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'user_level' => 'User Level',
        ];
    }
    
     public static function findIdentity($id){
		return static::findOne($id);
	}
 
	public static function findIdentityByAccessToken($token, $type = null){
		throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
	}
 
	public function getId(){
		return $this->id;
	}
 
	public function getAuthKey(){
		return $this->authKey;//Here I return a value of my authKey column
	}
 
	public function validateAuthKey($authKey){
		return $this->authKey === $authKey;
	}
	public static function findByUsername($username){
		return self::findOne(['username'=>$username]);
	}
 
	public function validatePassword($password){
		return $this->password === $password;
	}
    
     public static function isUserAdmin($username){
        
        if(static::findOne(['username'=>$username, 'user_level'=>'Admin'])){
            return true;
        }else{
            return false;
        }    
    }
    
}
