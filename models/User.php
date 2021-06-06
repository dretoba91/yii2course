<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property int $status
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const DEFAULT = 0;

    const ADMIN = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'username', 'password', 'status'], 'required'],
            [['status'], 'integer'],
            [['name', 'username', 'password'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        
        return static::findOne(['access_token' => $token]);
        
    }

    
    public function getId()
    {
        return $this->id;
    }

    
    public function getAuthKey()
    {
        // return $this->auth_Key;
    }

    
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
        
    }


        public function validatePassword($password)
    {
        return $this->password === $password;
    }

    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         if ($this->isNewRecord) {
    //             $this->auth_key = \Yii::$app->security->generateRandomString();
    //         }
    //         return true;
    //     }
    //     return false;
    // }

    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['user_id' => 'id'])->where(['type' => self::DEFAULT]);
    }
}
