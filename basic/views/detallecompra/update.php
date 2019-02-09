<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */

$this->title = 'Detalle Compra: ' . $model->idDetalleCompra;
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetalleCompra, 'url' => ['view', 'id' => $model->idDetalleCompra]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detallecompra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
