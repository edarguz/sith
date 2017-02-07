<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cursoextension;

/**
 * CursoextensionSearch represents the model behind the search form about `backend\models\Cursoextension`.
 */
class CursoextensionSearch extends Cursoextension
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso_extension', 'id_facultad'], 'integer'],
            [['curso'], 'safe'],
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
        $query = Cursoextension::find();

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
            'id_curso_extension' => $this->id_curso_extension,
            'id_facultad' => $this->id_facultad,
        ]);

        $query->andFilterWhere(['like', 'curso', $this->curso]);

        return $dataProvider;
    }
}
