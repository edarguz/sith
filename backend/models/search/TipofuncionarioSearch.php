<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tipofuncionario;

/**
 * TipofuncionarioSearch represents the model behind the search form about `backend\models\Tipofuncionario`.
 */
class TipofuncionarioSearch extends Tipofuncionario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_funcionario'], 'integer'],
            [['tipo_funcionario'], 'safe'],
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
        $query = Tipofuncionario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tipo_funcionario' => $this->id_tipo_funcionario,
        ]);

        $query->andFilterWhere(['like', 'tipo_funcionario', $this->tipo_funcionario]);

        return $dataProvider;
    }
}
