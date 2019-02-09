<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3><?= $msg ?></h3>

<h1>Registro</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>

<div class="form-group">
 <?= $form->field($model, "Rut")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "Nombre")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "Apellido")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "Clave")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "Clave_repeat")->input("password") ?>   
</div>

<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>