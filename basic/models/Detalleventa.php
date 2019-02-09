<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleventa".
 *
 * @property integer $idDetalleVenta
 * @property integer $Cantidad
 * @property integer $Total
 * @property integer $Producto_idProducto
 * @property integer $Venta_idVenta
 *
 * @property Producto $productoIdProducto
 * @property Venta $ventaIdVenta
 */
class Detalleventa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalleventa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cantidad', 'Total', 'Producto_idProducto', 'Venta_idVenta'], 'integer'],
            [['Producto_idProducto', 'Venta_idVenta'], 'required'],
            [['Producto_idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['Producto_idProducto' => 'idProducto']],
            [['Venta_idVenta'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['Venta_idVenta' => 'idVenta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDetalleVenta' => 'Id Detalle Venta',
            'Cantidad' => 'Cantidad',
            'Total' => 'Total',
            'Producto_idProducto' => 'Producto Id Producto',
            'Venta_idVenta' => 'Venta Id Venta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoIdProducto()
    {
        return $this->hasOne(Producto::className(), ['idProducto' => 'Producto_idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentaIdVenta()
    {
        return $this->hasOne(Venta::className(), ['idVenta' => 'Venta_idVenta']);
    }
    
     public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['idProducto' => 'Producto_idProducto']);
    }
    
      public static function actualizarTotal($model,$total)
    {
        $venta = Detalleventa::findOne($model->idDetalleVenta);
        $venta->Total = $total;
        $venta->save();
    }
    
    
}
