<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\select2;
use yii\helpers\ArrayHelper;
use app\models\producto;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm 

     
    <?php 
        echo $form->field($model, 'Nombre')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Producto::find()->all(),'idProducto','Nombre'),
            'language' => 'es',
            'options' => ['placeholder' => 'Selecciona un producto'],
             'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Nombre') ;
    ?>
    


*/
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    
    
    <?php echo $form->field($model,'TipoProducto')->dropDownList( ['Bebestible'=>'Bebestible','Abarrotes' => 'Abarrotes','Aseo' => 'Aseo','Panadería' => 'Panadería','Verduras' => 'Verduras'],['prompt'=>'Seleccione el tipo de producto']) ?>

    <?= $form->field($model, 'Precio')->textInput() ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar Producto' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
