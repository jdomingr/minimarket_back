<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vendedor */

$this->title = 'Vendedor';
$this->params['breadcrumbs'][] = ['label' => 'Vendedor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
