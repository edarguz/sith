<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kartik\select2\Select2; 
use backend\models\Novedad;

/**
 * NovedadSearch represents the model behind the search form about `backend\models\Novedad`.
 */
class NovedadSearch extends Novedad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_novedad', 'id_tipo_novedad', 'id_funcionario'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['observaciones'], 'safe'],
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
        $query = Novedad::find();

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
            'id_novedad' => $this->id_novedad,
            'id_tipo_novedad' => $this->id_tipo_novedad,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'id_funcionario' => $this->id_funcionario,
        ]);

         $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);
        return $dataProvider;
    }
}
