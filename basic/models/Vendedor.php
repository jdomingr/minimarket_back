<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendedor".
 *
 * @property integer $id
 * @property string $Rut
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Clave
 * @property string $authKey
 *
 * @property Compra[] $compras
 * @property Venta[] $ventas
 */
class Vendedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Rut', 'authKey'], 'required'],
            [['Rut'], 'string', 'max' => 20],
            [['Rut'], 'validateRut'],
            [['Nombre', 'Apellido', 'Clave'], 'string', 'max' => 45],
            [['authKey'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Rut' => 'Rut',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Clave' => 'Clave',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['Vendedor_Rut' => 'Rut']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['Vendedor_Rut' => 'Rut']);
    }
	
    public function validateRut($attribute, $params) {
        $data = explode('-', $this->Rut);
        $evaluate = strrev($data[0]);
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10)
            $result = 'k';
        if ($result == 11)
            $result = 0;
        if ($verifyCode != $result)
            $this->addError('Rut', 'Rut inválido.');
    }
}
