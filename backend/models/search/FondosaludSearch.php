<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Fondosalud;

/**
 * FondosaludSearch represents the model behind the search form about `backend\models\Fondosalud`.
 */
class FondosaludSearch extends Fondosalud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fondo_salud'], 'integer'],
            [['fondo_salud'], 'safe'],
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
        $query = Fondosalud::find();

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
            'id_fondo_salud' => $this->id_fondo_salud,
        ]);

        $query->andFilterWhere(['like', 'fondo_salud', $this->fondo_salud]);

        return $dataProvider;
    }
}
