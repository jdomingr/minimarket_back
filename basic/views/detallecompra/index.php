<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetallecompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle de Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallecompra-index">

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

            'idDetalleCompra',
            'Cantidad',
            'Total',
            'Producto_idProducto',
            'Compra_idCompra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
