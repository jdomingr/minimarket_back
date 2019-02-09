<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalleventa;

/**
 * DetalleventaSearch represents the model behind the search form about `app\models\Detalleventa`.
 */
class DetalleventaSearch extends Detalleventa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDetalleVenta', 'Cantidad', 'Total', 'Producto_idProducto', 'Venta_idVenta'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Detalleventa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idDetalleVenta' => $this->idDetalleVenta,
            'Cantidad' => $this->Cantidad,
            'Total' => $this->Total,
            'Producto_idProducto' => $this->Producto_idProducto,
            'Venta_idVenta' => $this->Venta_idVenta,
        ]);

        return $dataProvider;
    }
}
