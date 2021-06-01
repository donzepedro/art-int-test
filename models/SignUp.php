<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;
/**
 * Description of SignUp
 *
 * @author zepedro
 */
class SignUp extends Model{
    
    public $email;
    public $password;
    
    public function rules() 
    {
            return [
              [['email','password'],'required'],
                ['email','email'],
                ['email','unique','targetClass'=>'app\models\Users'],
                ['password','string','min'=>2,'max'=>16]
            ];
    }//put your code here
    
    public function signup(){
        $user = new Users();
        $user->email = $this->email;
        $user->setPassword($this->password);
        return $user->save();
    }
    
}
