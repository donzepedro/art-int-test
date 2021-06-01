<?php

namespace app\controllers;
use app\models\SignUp;
class SignupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(!\Yii::$app->user->isGuest){
           return $this->redirect('/main-page');
        }
        $signup = new SignUp();
//        print_r($signup);
//        var_dump($this->request->post('SignUp'));
//        die;
//        return $this->render('index',['signup'=>$signup]);
        if($this->request->post('SignUp') != Null)
        {
            $signup->attributes = \Yii::$app->request->post('SignUp');
        }
        
        if($signup->validate() && $signup->signup())
        {
            $this->redirect('/main-page');
        }
        return $this->render('index', compact('signup'));
    }

}