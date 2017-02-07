<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Funcionario;

/**
 * FuncionarioSearch represents the model behind the search form of `backend\models\Funcionario`.
 */
class FuncionarioSearch extends Funcionario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'identificacion', 'id_genero', 'id_tipo_funcionario', 'id_estado_civil', 'id_rh', 'id_banco'], 'integer'],
            [['nombres', 'apellidos', 'fecha_exp', 'lugar_expedicion', 'fecha_nac', 'lugar_nac', 'direccion', 'telefono', 'tel_movil', 'email', 'estado', 'numero_cuenta'], 'safe'],
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
        $query = Funcionario::find();

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
            'id_funcionario' => $this->id_funcionario,
            'identificacion' => $this->identificacion,
            'fecha_exp' => $this->fecha_exp,
            'id_genero' => $this->id_genero,
            'id_tipo_funcionario' => $this->id_tipo_funcionario,
            'fecha_nac' => $this->fecha_nac,
            'id_estado_civil' => $this->id_estado_civil,
            'id_rh' => $this->id_rh,
            'id_banco' => $this->id_banco,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'lugar_expedicion', $this->lugar_expedicion])
            ->andFilterWhere(['like', 'lugar_nac', $this->lugar_nac])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'tel_movil', $this->tel_movil])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'numero_cuenta', $this->numero_cuenta]);

        return $dataProvider;
    }
}
