<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallecompra".
 *
 * @property integer $idDetalleCompra
 * @property integer $Cantidad
 * @property integer $Total
 * @property integer $Producto_idProducto
 * @property integer $Compra_idCompra
 *
 * @property Compra $compraIdCompra
 * @property Producto $productoIdProducto
 */
class Detallecompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallecompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Cantidad', 'Total', 'Producto_idProducto', 'Compra_idCompra'], 'integer'],
            [['Producto_idProducto', 'Compra_idCompra'], 'required'],
            [['Compra_idCompra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['Compra_idCompra' => 'idCompra']],
            [['Producto_idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['Producto_idProducto' => 'idProducto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDetalleCompra' => 'Id Detalle Compra',
            'Cantidad' => 'Cantidad',
            'Total' => 'Total',
            'Producto_idProducto' => 'Producto Id Producto',
            'Compra_idCompra' => 'Compra Id Compra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompraIdCompra()
    {
        return $this->hasOne(Compra::className(), ['idCompra' => 'Compra_idCompra']);
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
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['idProducto' => 'Producto_idProducto']);
    }
    
    
       public static function actualizarTotal($model,$total)
    {
        $compra = Detallecompra::findOne($model->idDetalleCompra);
        $compra->Total = $total;
        $compra->save();
    }
    
    
      
    
    
}
