<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
[
                'attribute'=>'idCompra',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
    [
                'attribute'=>'NombreProveedor',
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
