<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rh;

/**
 * RhSearch represents the model behind the search form about `backend\models\Rh`.
 */
class RhSearch extends Rh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rh'], 'integer'],
            [['rh'], 'safe'],
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
        $query = Rh::find();

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
            'id_rh' => $this->id_rh,
        ]);

        $query->andFilterWhere(['like', 'rh', $this->rh]);

        return $dataProvider;
    }
}
