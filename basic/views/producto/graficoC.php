<?php
use sjaakp\gcharts\ColumnChart;
?>

<?= ColumnChart::widget([
    'height' => '500px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'Nombre:string',
        'Stock'
    ],
    'options' => [
        'title' => 'Stock de cada Producto en Inventario'
    ],
]) ?>
