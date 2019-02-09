<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property integer $idVenta
 * @property string $Fecha
 * @property string $Vendedor_Rut
 *
 * @property Detalleventa[] $detalleventas
 * @property Vendedor $vendedorRut
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Vendedor_Rut'], 'required'],
            [['Vendedor_Rut'], 'string', 'max' => 20],
            [['Vendedor_Rut'], 'exist', 'skipOnError' => true, 'targetClass' => Vendedor::className(), 'targetAttribute' => ['Vendedor_Rut' => 'Rut']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVenta' => 'Id Venta',
            'Fecha' => 'Fecha',
            'Vendedor_Rut' => 'Vendedor  Rut',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::className(), ['Venta_idVenta' => 'idVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendedorRut()
    {
        return $this->hasOne(Vendedor::className(), ['Rut' => 'Vendedor_Rut']);
    }
    
    public static function obtieneTotalVentaPorItem($model){
        //obtiene el total por item en compras..
        $provider=DetalleVenta::find()->where(['Venta_idVenta'=>$model->idVenta])->all();
        $sumatoria=0;
        foreach($provider as $key => $val){
            //$val sería un detalle de compra
            $sumatoria=$sumatoria+($val->Cantidad*$val->producto->Precio);
        }
        return $sumatoria;
        
    }
    
    public static function totalVentas($dataProvider2){
        //recive un provider de detalle de compra....
        $sumatoria=0;
        foreach($dataProvider2->getModels() as $key => $val){
            $sumatoria+=($val->Cantidad*$val->producto->Precio);
        }
        
        return $sumatoria;
    }
    
     public static function totalVentasVtasDiarias(){
         //obtengo todas las compras
        $compras=Venta::find()->where(['Fecha'=>date('Y-m-d')])->all();
        $sumatoria=0;
        foreach($compras as $compra){
            foreach($compra->detalleventas as $detalle){
               $sumatoria=$sumatoria+($detalle->Cantidad * $detalle->producto->Precio);   
            }
        }
        return $sumatoria;
    }
    
    
}
