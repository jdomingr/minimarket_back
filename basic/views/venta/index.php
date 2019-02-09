<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
[
                'attribute'=>'idVenta',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
    [
                'attribute'=>'Fecha',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
    [
                'attribute'=>'Vendedor_Rut',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
