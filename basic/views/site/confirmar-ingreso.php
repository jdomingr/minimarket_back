<?php
use yii\helpers\Html;
?>
<p>Usted ha ingresado la siguiente informacion:</p>

<ul>
     <li><label>Rut</label>: <?= Html::encode($model->Rut) ?></li>
    <li><label>Nombre</label>: <?= Html::encode($model->Nombre) ?></li>
    <li><label>Apellido</label>: <?= Html::encode($model->Apellido) ?></li>
	 <li><label>Clave</label>: <?= Html::encode($model->Clave) ?></li>
</ul>