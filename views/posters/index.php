<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$items= ArrayHelper::map($cities,'id','cityname');
$param = [
    'promt' => 'enter sity'
];

?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($poster,'FIO')->textInput(['autofocus'=>true])->label('Full Name')?>
<?= $form->field($poster,'PosterText')->textArea()->label('Poster Text')?>
<?= $form->field($poster,'City')->dropDownList($items,$param)->label('City')?>
<?= $form->field($poster,'address')->textInput()->label('Address')?>
<div>
   <?= Html::submitButton('Add Poster', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end() ?>

