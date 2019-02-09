<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\select2;
use yii\helpers\ArrayHelper;
use app\models\producto;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */
/* @var $form yii\widgets\ActiveForm */

 
        
?>

<div class="detalleventa-form">

    <?php $form = ActiveForm::begin(); ?>

   

  

    <?php echo $form->field($model, 'Producto_idProducto')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Producto::find()->all(),'idProducto','Nombre'),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un producto'],
             'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nombre Producto') ;
?>
   
     <?= $form->field($model, 'Cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Detalle' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <div class="form-group">
        <?= Html::a('Terminar', ['site/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
