<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Datosacademicos;

/**
 * DatosacademicosSearch represents the model behind the search form about `backend\models\Datosacademicos`.
 */
class DatosacademicosSearch extends Datosacademicos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_datos_acad', 'id_funcionario', 'id_titulo'], 'integer'],
            [['titulo', 'institucion', 'fecha_titulo'], 'safe'],
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
        $query = Datosacademicos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->load($params) && $this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_datos_acad' => $this->id_datos_acad,
            'id_funcionario' => $this->id_funcionario,
            'id_titulo' => $this->id_titulo,
            'fecha_titulo' => $this->fecha_titulo,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'institucion', $this->institucion]);

        return $dataProvider;
    }
}
