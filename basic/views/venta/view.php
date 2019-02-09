<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use app\models\Venta;
use app\models\Detalleventa;
use app\models\Producto;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title =  $model->idVenta;
$this->params['breadcrumbs'][] = ['label' => 'Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-view">

    <h1><?= "Venta número: ".Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idVenta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idVenta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar esta venta?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idVenta',
            'Fecha',
        ],
    ]) ?>
    
     <?= Html::button('Agregar Producto', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['detalleventa/create','id'=>$model->idVenta]), 'class' => 'btn btn-success']) ?>
    <?php
        Modal::begin([
            'header' => '<h2>Detalle de venta</h2>',
            'id'     => 'model',
            'size'   => 'model-lg',
        ]);

         echo "<div id='modelContent'></div>";

        Modal::end();
    ?>
    
    <script>
        $(function(){
        $('#modelButton').click(function(){
            $('.modal').modal('show')
                .find('#modelContent')
                .load($(this).attr('value'));
            });
        });
    </script>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
             'header' => 'ID producto',
             'value' => 'Producto_idProducto',
            ],
            
            [
             'header'=>'Producto',
             'value'=>function($model){
                    return $model->producto->Nombre;
                }
            ],
          
            [
             'header'=>'Precio',
             'value'=>function($model){
                    return "$".number_format($model->producto->Precio);
                }
            ],
    
            [
              'header'=>'Cantidad',
              'value' =>function ($model){
                 $cantidad = $model->Cantidad;
                  Producto::restarStock($model,$cantidad);
                  return $cantidad;
              },
                'footer'=>'<b>Total General</b>',
            ],

            [
              'header'=>'Total Linea',
              'value' =>function ($model){
                  $precioTotal = $model->Cantidad * $model->producto->Precio;
                  Detalleventa::actualizarTotal($model,$precioTotal);
                  return "$".number_format($precioTotal);
              },
                'footer'=>"$".number_format(Venta::totalVentas($dataProvider2)),
            ],

            ['class' => 'yii\grid\ActionColumn',
                 'template' => '{delete}',
            ],
        ],
    ]); ?>
    
    
    

</div>
