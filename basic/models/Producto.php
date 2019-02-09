<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $idProducto
 * @property string $Nombre
 * @property string $TipoProducto
 * @property integer $Precio
 * @property integer $Stock
 *
 * @property Detallecompra[] $detallecompras
 * @property Detalleventa[] $detalleventas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Precio', 'Stock'], 'integer'],
            [['Nombre', 'TipoProducto'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProducto' => 'Id Producto',
            'Nombre' => 'Nombre',
            'TipoProducto' => 'Tipo Producto',
            'Precio' => 'Precio',
            'Stock' => 'Stock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecompras()
    {
        return $this->hasMany(Detallecompra::className(), ['Producto_idProducto' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['Producto_idProducto' => 'idProducto']);
    }
    
    
     public static function agregarStock($model,$cantidad)
    {
        $producto = producto::findOne($model->Producto_idProducto);
        $cant = $producto->Stock; 
        $producto->Stock = $cant + $cantidad;
        $producto->save();
    }
    
       public static function restarStock($model,$cantidad)
    {
        $producto = producto::findOne($model->Producto_idProducto);
        $cant = $producto->Stock; 
        $producto->Stock = $cant - $cantidad;
        $producto->save();
    }
    
    
    
}
