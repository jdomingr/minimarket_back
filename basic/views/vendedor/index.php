<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendedor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ingresar Vendedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             [
                'attribute'=>'id',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
     [
                'attribute'=>'Rut',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
     [
                'attribute'=>'Nombre',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
         [
                'attribute'=>'Apellido',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
            
            //'Clave',
            // 'authKey',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
