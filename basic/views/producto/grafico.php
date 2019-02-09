<?php
use sjaakp\gcharts\PieChart;
?>

<?= PieChart::widget([
    'height' => '700px',
    'dataProvider' => $dataProvider,
    'columns' => [
        'Nombre:string',
        'Stock'
    ],
    'options' => [
        'title' => 'Stock de cada Producto en Inventario'
    ],
]) ?>
