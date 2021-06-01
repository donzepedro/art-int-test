<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;
/**
 * Description of Login
 *
 * @author zepedro
 */
class Login extends Model {
    public $email;
    public $password;
   
    public function rules() 
    {
            return [
              [['email','password'],'required'],
                ['email','email'],
                ['password','validatePassword']
            ];
    }
    
    public function validatePassword($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getUser();
        
            if(!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute,'Email or Password incorrect');
            }
        }
    }
    
    public function getUser()
    {
        return Users::findOne(['email'=>$this->email]);
    }
}
