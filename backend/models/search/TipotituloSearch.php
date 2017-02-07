<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tipotitulo;

/**
 * TipotituloSearch represents the model behind the search form about `backend\models\Tipotitulo`.
 */
class TipotituloSearch extends Tipotitulo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipotitulo', 'vr_hora'], 'integer'],
            [['tipotitulo'], 'safe'],
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
        $query = Tipotitulo::find();

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
            'id_tipotitulo' => $this->id_tipotitulo,
            'vr_hora' => $this->vr_hora,
        ]);

        $query->andFilterWhere(['like', 'tipotitulo', $this->tipotitulo]);

        return $dataProvider;
    }
}
