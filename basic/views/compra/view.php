<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use app\models\Compra;
use app\models\Detallecompra;
use app\models\Producto;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Compra */

$this->title = $model->idCompra;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Compra N°:".$this->title;
?>
<div class="compra-view">

    <h1><?= "Compra numero: ".Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idCompra], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idCompra], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar esta compra?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCompra',
            'NombreProveedor',
            'Fecha',
           
        ],
    ]) ?>

 <?= Html::button('Agregar Producto', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['detallecompra/create','id'=>$model->idCompra]), 'class' => 'btn btn-success']) ?>
    <?php
        Modal::begin([
            'header' => '<h2>Detalle de Compra</h2>',
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
                  Producto::agregarStock($model,$cantidad);
                  return $cantidad;
              },
                'footer'=>'<b>Total General</b>',
            ],

            [
              'header'=>'Total',
              'value' =>function ($model){
                  $precioTotal = $model->Cantidad * $model->producto->Precio;
                  Detallecompra::actualizarTotal($model,$precioTotal);
                  return "$".number_format($precioTotal);
              },
                'footer'=>"$".number_format(Compra::totalCompras($dataProvider2)),
            ],

            ['class' => 'yii\grid\ActionColumn',
                 'template' => '{delete}',
            ],
        ],
    ]); ?>
    
</div>