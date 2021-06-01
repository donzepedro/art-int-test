<?php

namespace app\controllers;

use Yii;
use app\models\Login;

class SigninController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest)
        {
             return $this->redirect('/main-page');
        }
        $login_model = new Login();
        
        if(Yii::$app->request->post('Login'))
        {
//            var_dump(Yii::$app->request->post('Login'));
//            die;
            $login_model->attributes = Yii::$app->request->post('Login');
            
            
            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser(),99999);
                return $this->redirect('/main-page');
//                var_dump('we are validated');die;
            }
        }
        return $this->render('index',compact('login_model'));
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/main-page');
    }

}
