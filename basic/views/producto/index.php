<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    
            [
                'attribute'=>'idProducto',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
           [
                'attribute'=>'Nombre',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
    [
                'attribute'=>'TipoProducto',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
            [
                'attribute'=>'Precio',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
                'value' =>function($model){
                    return "$".number_format($model->Precio);
                },
            ],
           [
                'attribute'=>'Stock',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
