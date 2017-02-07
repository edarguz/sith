<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Programa;

/**
 * ProgramaSearch represents the model behind the search form about `backend\models\Programa`.
 */
class ProgramaSearch extends Programa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_programa', 'id_facultad'], 'integer'],
            [['programa'], 'safe'],
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
        $query = Programa::find();

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
            'id_programa' => $this->id_programa,
            'id_facultad' => $this->id_facultad,
        ]);

        $query->andFilterWhere(['like', 'programa', $this->programa]);

        return $dataProvider;
    }
}
