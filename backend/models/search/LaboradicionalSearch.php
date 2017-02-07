<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Laboradicional;

/**
 * LaboradicionalSearch represents the model behind the search form about `backend\models\Laboradicional`.
 */
class LaboradicionalSearch extends Laboradicional
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_laboradicional', 'id_funcionario', 'id_periodo_academico', 'id_programa', 'id_facultad', 'id_semestre', 'id_modulo', 'horas_sem', 'id_tipotitulo', 'vr_hora'], 'integer'],
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
        $query = Laboradicional::find();

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
            'id_laboradicional' => $this->id_laboradicional,
            'id_funcionario' => $this->id_funcionario,
            'id_periodo_academico' => $this->id_periodo_academico,
            'id_programa' => $this->id_programa,
            'id_facultad' => $this->id_facultad,
            'id_semestre' => $this->id_semestre,
            'id_modulo' => $this->id_modulo,
            'horas_sem' => $this->horas_sem,
            'id_tipotitulo' => $this->id_tipotitulo,
            'vr_hora' => $this->vr_hora,
            
        ]);

        return $dataProvider;
    }
}
