<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Venta;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ventas diarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-index">

    <h1><?php
        
        echo Html::encode("Ventas Diarias"); 
        echo " Del: ".date('d-m-Y')    ;
        ?>  
    </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'header' => 'RUT Vendedor',
                'value' => function($model){
                    return $model->vendedorRut->Rut;
                },
                'footer' => '<center><b>Total: </b></center>',  
            ],
            
             [
                'header'=>'Monto Total Venta',
                 'value'=>function ($model){
                     return "$".number_format(Venta::obtieneTotalVentaPorItem($model));
                 },
                'footer'=>"$".number_format(Venta::totalVentasVtasDiarias()),
            ]
                
        ],
    ]);  
    ?>
</div>