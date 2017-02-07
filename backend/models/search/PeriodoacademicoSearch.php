<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Periodoacademico;

/**
 * PeriodoacademicoSearch represents the model behind the search form about `backend\models\Periodoacademico`.
 */
class PeriodoacademicoSearch extends Periodoacademico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo_academico'], 'integer'],
            [['periodo'], 'safe'],
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
        $query = Periodoacademico::find();

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
            'id_periodo_academico' => $this->id_periodo_academico,
        ]);

        $query->andFilterWhere(['like', 'periodo', $this->periodo]);

        return $dataProvider;
    }
}
