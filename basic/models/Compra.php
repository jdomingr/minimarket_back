<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property integer $idCompra
 * @property string $NombreProveedor
 * @property string $Fecha
 * @property string $Vendedor_Rut
 *
 * @property Vendedor $vendedorRut
 * @property Detallecompra[] $detallecompras
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Vendedor_Rut'], 'required'],
            [['NombreProveedor'], 'string', 'max' => 45],
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
            'idCompra' => 'Id Compra',
            'NombreProveedor' => 'Nombre Proveedor',
            'Fecha' => 'Fecha',
            'Vendedor_Rut' => 'Vendedor  Rut',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendedorRut()
    {
        return $this->hasOne(Vendedor::className(), ['Rut' => 'Vendedor_Rut']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecompras()
    {
        return $this->hasMany(Detallecompra::className(), ['Compra_idCompra' => 'idCompra']);
    }
    
    
     public static function obtieneTotalCompraPorItem($model){
        //obtiene el total por item en compras..
        $provider=DetalleCompra::find()->where(['Compra_idCompra'=>$model->idCompra])->all();
        $sumatoria=0;
        foreach($provider as $key => $val){
            //$val sería un detalle de compra
            $sumatoria=$sumatoria+($val->Cantidad*$val->producto->Precio);
        }
        return $sumatoria;
        
    }
    
    public static function totalCompras($dataProvider2){
        //recive un provider de detalle de compra....
        $sumatoria=0;
        foreach($dataProvider2->getModels() as $key => $val){
            $sumatoria+=($val->Cantidad*$val->producto->Precio);
        }
        return $sumatoria;
    }
    
     public static function totalComprasVtasDiarias(){
         //obtengo todas las compras del mes
        $date =date('y-m-d');
        $ultimo = date('y-m-t',strtotime($date));
        $primero = date('y-m-01');
        $compras=Compra::find()->where(['between','Fecha',$primero,$ultimo])->all();
        $sumatoria=0;
        foreach($compras as $compra){
            foreach($compra->detallecompras as $detalle){
               $sumatoria=$sumatoria+($detalle->Cantidad * $detalle->producto->Precio);   
            }
        }
        return $sumatoria;
    }
    
    
    
}
