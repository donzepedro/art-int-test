<?php

namespace app\controllers;

use app\models\Cities;
use app\models\Posters;
class PostersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(\Yii::$app->user->isGuest){
           return $this->redirect('/main-page');
        }
        $poster = new Posters();
        $cities = Cities::find()->all();
        
        if(\Yii::$app->request->post('Posters')){
            
            $poster->attributes = \Yii::$app->request->post('Posters');
            if($poster->validate() &&  $poster->save()){
               
                $this->redirect('/main-page');
            }
        }
//        var_dump(\Yii::$app->request->post());
//        die;
        
        return $this->render('index', Compact('poster','cities'));
    }

}
