<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "tipofuncionario".
 *
 * @property string $id_tipo_funcionario
 * @property string $tipo_funcionario
 *
 * @property Funcionario[] $funcionarios
 */
class Tipofuncionario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipofuncionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_funcionario'], 'required'],
            [['tipo_funcionario'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_funcionario' => Yii::t('app', 'Id Tipo Funcionario'),
            'tipo_funcionario' => Yii::t('app', 'Tipo Funcionario'),
        ];
    }

    public static  function  get_tfuncionario(){
          $ar = Tipofuncionario::find()->all();

          $ar = ArrayHelper::map($ar, 'id_tipo_funcionario', 'tipo_funcionario');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasMany(Funcionario::className(), ['id_tipo_funcionario' => 'id_tipo_funcionario']);
    }
}
