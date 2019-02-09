<?php



namespace app\models;
use Yii;
use yii\base\model;
use app\models\Users;

class FormularioVendedor extends model{
	
    public $Rut;
	public $Nombre;
    public $Apellido;
	public $Clave;
    public $Clave_repeat;
    
    public function rules(){
        return [
            [['Rut','Nombre','Apellido','Clave'], 'required'],
            [['Rut'], 'string', 'max' => 20],
            [['Rut'], 'validateRut'],
            [['Nombre', 'Apellido', 'Clave'], 'string', 'max' => 45],
			['Clave', 'match', 'pattern' => "/^.{6,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
			[['Clave_repeat'], 'required'],
            ['Clave_repeat', 'compare', 'compareAttribute' => 'Clave', 'message' => 'Los passwords no coinciden'],
        ];
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

?> 

