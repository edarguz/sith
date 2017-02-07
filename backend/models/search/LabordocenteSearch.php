<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Labordocente;

/**
 * LabordocenteSearch represents the model behind the search form about `backend\models\Labordocente`.
 */
class LabordocenteSearch extends Labordocente
{
    /**
     * @inheritdoc
     */



    public function rules()
    {
        return [
            [['id_labor', 'id_facultad', 'id_programa', 'id_modulo', 'id_semestre', 'id_jornada','id_funcionario', 'id_datosacad', 'id_tipotitulo', 'id_periodo_academico', 'vr_hora'], 'integer'],
            [['horas_semanales', 'horas_trabajo_grado', 'total_horas_sem','horas_examenes_finales', 'horas_reunion_general', 'horas_reunion_facultad', 'horas_jurado_grado'], 'number'],
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
        //carga el index de labordocente 
        $query = Labordocente::find()->with('periodoAcademico')->where(['id_periodo_academico'=>'3']);
        //$query = Labordocente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_labor' => $this->id_labor,
            'id_facultad' => $this->id_facultad,
            'id_programa' => $this->id_programa,
            'id_modulo' => $this->id_modulo,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' =>  $this->fecha_fin,
            'id_semestre' => $this->id_semestre,
            'id_jornada' => $this->id_jornada,
            'id_funcionario' => $this->id_funcionario,
            'id_datosacad' => $this->id_datosacad,
            'id_tipotitulo' => $this->id_tipotitulo,
            'id_periodo_academico' => $this->id_periodo_academico,
            'horas_semanales' => $this->horas_semanales,
            'horas_trabajo_grado' => $this->horas_trabajo_grado,
            'total_horas_sem' => $this->total_horas_sem,
            'horas_examenes_finales' => $this->horas_examenes_finales,
            'horas_reunion_general' => $this->horas_reunion_general,
            'horas_reunion_facultad' => $this->horas_reunion_facultad,
            'horas_jurado_grado' => $this->horas_jurado_grado,
            'vr_hora' => $this->vr_hora,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);
        return $dataProvider;
    }
}
