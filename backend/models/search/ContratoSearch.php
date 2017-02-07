<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contrato;

/**
 * ContratoSearch represents the model behind the search form of `backend\models\Contrato`.
 */
class ContratoSearch extends Contrato
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contrato', 'id_funcionario', 'id_area', 'id_escalafon', 'id_cargo', 'vr_hora', 'id_labor', 'id_laboradicional', 'id_fondosalud', 'id_arl', 'id_fondopensiones'], 'integer'],
            [['num_resolucion', 'fecha_inicio', 'fecha_fin', 'observaciones'], 'safe'],
            [['valor_contrato'], 'number'],
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
        $query = Contrato::find();

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
            'id_contrato' => $this->id_contrato,
            'id_funcionario' => $this->id_funcionario,
            'id_area' => $this->id_area,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'id_escalafon' => $this->id_escalafon,
            'id_cargo' => $this->id_cargo,
            'valor_contrato' => $this->valor_contrato,
            'vr_hora' => $this->vr_hora,
            'id_labor' => $this->id_labor,
            'id_laboradicional' => $this->id_laboradicional,
            'id_fondosalud' => $this->id_fondosalud,
            'id_arl' => $this->id_arl,
            'id_fondopensiones' => $this->id_fondopensiones,
        ]);

        $query->andFilterWhere(['like', 'num_resolucion', $this->num_resolucion])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
