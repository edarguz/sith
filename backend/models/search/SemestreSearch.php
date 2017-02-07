<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Semestre;

/**
 * SemestreSearch represents the model behind the search form about `backend\models\Semestre`.
 */
class SemestreSearch extends Semestre
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_semestre'], 'integer'],
            [['semestre'], 'safe'],
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
        $query = Semestre::find();

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
            'id_semestre' => $this->id_semestre,
        ]);

        $query->andFilterWhere(['like', 'semestre', $this->semestre]);

        return $dataProvider;
    }
}
