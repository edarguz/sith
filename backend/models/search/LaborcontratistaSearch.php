<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Laborcontratista;

/**
 * LaborcontratistaSearch represents the model behind the search form of `backend\models\Laborcontratista`.
 */
class LaborcontratistaSearch extends Laborcontratista
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contratista', 'id_funcionario', 'valor_contrato', 'cdp', 'id_tipotitulo', 'id_cargo', 'id_area', 'num_cuotas', 'id_fondosalud', 'id_arl', 'id_fondopensiones'], 'integer'],
            [['num_contrato', 'fecha_cdp', 'fecha_suscripcion', 'fecha_inicio', 'fecha_fin', 'fecha_registro', 'objeto', 'actividades', 'supervisor', 'forma_pago'], 'safe'],
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
        $query = Laborcontratista::find();

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
            'id_contratista' => $this->id_contratista,
            'id_funcionario' => $this->id_funcionario,
            'valor_contrato' => $this->valor_contrato,
            'cdp' => $this->cdp,
            'fecha_cdp' => $this->fecha_cdp,
            'fecha_suscripcion' => $this->fecha_suscripcion,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'fecha_registro' => $this->fecha_registro,
            'id_tipotitulo' => $this->id_tipotitulo,
            'id_cargo' => $this->id_cargo,
            'id_area' => $this->id_area,
            'num_cuotas' => $this->num_cuotas,
            'id_fondosalud' => $this->id_fondosalud,
            'id_arl' => $this->id_arl,
            'id_fondopensiones' => $this->id_fondopensiones,
        ]);

        $query->andFilterWhere(['like', 'num_contrato', $this->num_contrato])
            ->andFilterWhere(['like', 'objeto', $this->objeto])
            ->andFilterWhere(['like', 'actividades', $this->actividades])
            ->andFilterWhere(['like', 'supervisor', $this->supervisor])
            ->andFilterWhere(['like', 'forma_pago', $this->forma_pago]);

        return $dataProvider;
    }
}
