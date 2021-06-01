<?php

namespace app\controllers;
use Dadata;
use app\models\Cities;
use app\models\Posters;

class MainPageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
        $address =array();
        $token = "f29af34806c8cd8dbb765f3235c8b17e565fe6ff";
        $secret = "06cac31c5021fcf1f0081dcc17de34dc3ea973fa";
        $dadata = new \Dadata\DadataClient($token, $secret);
        $response = $dadata->clean("address", "Новочеркасск Красноармейская 59");

        $posters = Posters::find()->all();
        foreach ($posters as $k)
        foreach ($k as $key=>$val){
            if($key == 'City'){
                $city_name = Cities::find()->where(['id'=>$val])->one();
            }
            if($key == 'address'){
                $current_address = $city_name['cityname'] .' '.$val; 
                $response = $dadata->clean("address", $current_address);
                array_push($address,array('Lon'=>$response['geo_lon'],'Lat'=>$response['geo_lat'],'text'=>$k['PosterText']));
            }
        }
//        var_dump($address);
//        var_dump($response['geo_lon']);
//        var_dump($response['geo_lat']);
//        die;
        return $this->render('index',Compact('address'));
    }

}
