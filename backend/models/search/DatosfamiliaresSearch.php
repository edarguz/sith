<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Datosfamiliares;

/**
 * DatosfamiliareSearch represents the model behind the search form about `backend\models\Datosfamiliares`.
 */
class DatosfamiliaresSearch extends Datosfamiliares
{

    public $fullNombres;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_datos_fam', 'id_funcionario'], 'integer'],
            [['nombres', 'apellidos', 'genero', 'fullNombres', 'fecha_nacimiento'], 'safe'],
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
        $query = Datosfamiliares::find();

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
            'id_datos_fam' => $this->id_datos_fam,
            'id_funcionario' => $this->id_funcionario,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'fullNombres', $this->fullNombres])
            ->andFilterWhere(['like', 'genero', $this->genero]);

        return $dataProvider;
    }
}
