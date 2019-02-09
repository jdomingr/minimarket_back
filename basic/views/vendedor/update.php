<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vendedor */

$this->title = 'Vendedor: ' . $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Vendedor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Rut, 'url' => ['view', 'id' => $model->Rut]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
