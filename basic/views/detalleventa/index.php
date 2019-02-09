<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleventaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle de Venta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleventa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Detalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDetalleVenta',
            'Cantidad',
            'Total',
            'Producto_idProducto',
            'Venta_idVenta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
