<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */


$this->params['breadcrumbs'][] = ['label' => 'Detalle de Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallecompra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
