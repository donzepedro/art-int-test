<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php 
    $form = ActiveForm::begin();
?>

<?= $form->field($signup,'email')->textInput(['autofocus'=>true])?>

<?= $form->field($signup,'password')->passwordInput()?>

<div>
   <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>

<?php 
    ActiveForm::end();
?>