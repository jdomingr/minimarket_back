<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */


$this->params['breadcrumbs'][] = ['label' => 'Detalle de Venta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleventa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
