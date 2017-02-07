<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Funcionario as FuncionarioModel;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/**
 * Funcionario represents the model behind the search form about `backend\models\Funcionario`.
 */
class Funcionario extends FuncionarioModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'identificacion', 'id_genero', 'id_tipo_funcionario', 'id_estado_civil', 'id_rh'], 'integer'],
            [['nombres', 'apellidos', 'fecha_nac', 'lugar_nac', 'direccion', 'telefono', 'tel_movil','fullName', 'email'], 'safe'],
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
        $query = FuncionarioModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

         $dataProvider->setSort([
        'attributes' => [
            'id_funcionario',
            'fullName' => [
                'asc' => ['nombres' => SORT_ASC, 'apellidos' => SORT_ASC],
                'desc' => ['nombres' => SORT_DESC, 'apellidos' => SORT_DESC],
                'label' => 'Full Name',
                'default' => SORT_ASC
                ],
               
            ]
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
            'id_genero' => $this->id_genero,
            'id_tipo_funcionario' => $this->id_tipo_funcionario,
            'fecha_nac' => $this->fecha_nac,
            'id_estado_civil' => $this->id_estado_civil,
            'id_rh' => $this->id_rh,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'fullName', $this->fullName])
            ->andFilterWhere(['like', 'lugar_nac', $this->lugar_nac])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'tel_movil', $this->tel_movil])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
