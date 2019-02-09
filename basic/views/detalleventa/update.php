<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */

$this->title = 'Detalle Venta: ' . $model->idDetalleVenta;
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Venta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetalleVenta, 'url' => ['view', 'id' => $model->idDetalleVenta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalleventa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
