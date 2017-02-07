<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Modulo;

/**
 * ModuloSearch represents the model behind the search form of `backend\models\Modulo`.
 */
class ModuloSearch extends Modulo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_modulo', 'creditos', 'id_programa'], 'integer'],
            [['modulo'], 'safe'],
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
        $query = Modulo::find();

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
            'id_modulo' => $this->id_modulo,
            'creditos' => $this->creditos,
            'id_programa' => $this->id_programa,
        ]);

        $query->andFilterWhere(['like', 'modulo', $this->modulo]);

        return $dataProvider;
    }
}
