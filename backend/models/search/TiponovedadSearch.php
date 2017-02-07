<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tiponovedad;

/**
 * TiponovedadSearch represents the model behind the search form about `backend\models\Tiponovedad`.
 */
class TiponovedadSearch extends Tiponovedad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_novedad'], 'integer'],
            [['tipo_novedad'], 'safe'],
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
        $query = Tiponovedad::find();

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
            'id_tipo_novedad' => $this->id_tipo_novedad,
        ]);

        $query->andFilterWhere(['like', 'tipo_novedad', $this->tipo_novedad]);

        return $dataProvider;
    }
}
