<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallecompra;

/**
 * DetallecompraSearch represents the model behind the search form about `app\models\Detallecompra`.
 */
class DetallecompraSearch extends Detallecompra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDetalleCompra', 'Cantidad', 'Total', 'Producto_idProducto', 'Compra_idCompra'], 'integer'],
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
        $query = Detallecompra::find();

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
            'idDetalleCompra' => $this->idDetalleCompra,
            'Cantidad' => $this->Cantidad,
            'Total' => $this->Total,
            'Producto_idProducto' => $this->Producto_idProducto,
            'Compra_idCompra' => $this->Compra_idCompra,
        ]);

        return $dataProvider;
    }
}
