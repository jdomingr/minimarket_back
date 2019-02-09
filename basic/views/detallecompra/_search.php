<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetallecompraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallecompra-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDetalleCompra') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'Total') ?>

    <?= $form->field($model, 'Producto_idProducto') ?>

    <?= $form->field($model, 'Compra_idCompra') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
