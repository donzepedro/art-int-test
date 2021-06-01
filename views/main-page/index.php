<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\House;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;


$coord = new LatLng(['lat' => 47.1615821, 'lng' => 41.5318593]);
$map = new Map([
'center' => $coord,
'zoom' => 5,
]);
$map->width = 800;
$map->height = 600;?>

<div style="width:802px;border:1px solid red; margin-left:13%"> 
    <?php // Display the map -finally :)
    foreach ($address as $k=>$v){
        $point = new LatLng(['lat' => $v['Lat'], 'lng' => $v['Lon']]);
        $marker = new Marker([
            'position' => $point,
            'title' => $v['text'],
        ]);
        $map->addOverlay($marker);
    }
    echo $map->display(); 
    ?>
</div>