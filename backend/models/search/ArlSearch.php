<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Arl;

/**
 * ArlSearch represents the model behind the search form about `backend\models\Arl`.
 */
class ArlSearch extends Arl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_arl'], 'integer'],
            [['arl'], 'safe'],
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
        $query = Arl::find();

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
            'id_arl' => $this->id_arl,
        ]);

        $query->andFilterWhere(['like', 'arl', $this->arl]);

        return $dataProvider;
    }
}
