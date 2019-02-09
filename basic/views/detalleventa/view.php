<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */

$this->title = 'Detalle Venta: ' . $model->idDetalleVenta;
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Venta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleventa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idDetalleVenta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idDetalleVenta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este detalle?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idDetalleVenta',
            'Cantidad',
            'Total',
            'Producto_idProducto',
            'Venta_idVenta',
        ],
    ]) ?>

</div>
