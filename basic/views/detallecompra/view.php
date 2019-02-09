<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */

$this->title = 'Detalle: ' . $model->idDetalleCompra;
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallecompra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idDetalleCompra], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idDetalleCompra], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que desea eliminar este detalle?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idDetalleCompra',
            'Cantidad',
            'Total',
            'Producto_idProducto',
            'Compra_idCompra',
        ],
    ]) ?>

</div>
