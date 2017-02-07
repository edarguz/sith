<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Escalafon;

/**
 * EscalafonSearch represents the model behind the search form about `backend\models\Escalafon`.
 */
class EscalafonSearch extends Escalafon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_escalafon'], 'integer'],
            [['escalafon'], 'safe'],
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
        $query = Escalafon::find();

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
            'id_escalafon' => $this->id_escalafon,
        ]);

        $query->andFilterWhere(['like', 'escalafon', $this->escalafon]);

        return $dataProvider;
    }
}
