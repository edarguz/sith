<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Facultad;

/**
 * Facultadsearch represents the model behind the search form about `backend\models\Facultad`.
 */
class Facultadsearch extends Facultad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_facultad'], 'integer'],
            [['facultad'], 'safe'],
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
        $query = Facultad::find();

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
            'id_facultad' => $this->id_facultad,
        ]);

        $query->andFilterWhere(['like', 'facultad', $this->facultad]);

        return $dataProvider;
    }
}
