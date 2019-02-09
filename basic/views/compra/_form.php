<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Compra */
/* @var $form yii\widgets\ActiveForm 


 /* <?= $form->field($model, 'Fecha')->textInput() ?> */


?>

<div class="compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreProveedor')->textInput(['maxlength' => true]) ?>

   	<?php 
	
    echo DatePicker::widget([
	'model' => $model,
	'attribute'=> 'Fecha',
	'language'=> 'es',
	'readonly'=>'true',
	'options' => ['placeholder' => 'Ingrese la fecha de compra'],
	'pluginOptions' => [
		'format' => 'yyyy-mm-dd',
		'todayHighlight' => true,
		'autoclose' => true
	]
]);
	
	?>
    
   

    <?= $form->field($model, 'Vendedor_Rut')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Compra' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
