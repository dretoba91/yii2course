<?php

namespace app\models;

use yii;
use yii\base\Model;

class SignupForm extends Model
{
    
    Public $name;
    public $username;
    public $email;
    public $password;
    

    public function rules()
    {
        return [
            [['name', 'username', 'password'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['username', 'password'], 'string', 'max' => 64],
        ];
    }

    public function Signup()
    {
        $user = new User();   
        $user->name = $this->name;
        $user->username = $this->username;
        $user->password = $this->password;

        if($user->save(false)){
            
	        return true;
        }
    }
}