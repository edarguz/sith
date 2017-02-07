<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property string $id_genero
 * @property string $genero
 *
 * @property Funcionario[] $funcionarios
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genero'], 'required'],
            [['genero'], 'string', 'max' => 20],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_genero' => Yii::t('app', 'Id Genero'),
            'genero' => Yii::t('app', 'Genero'),
        ];
    }

    public static  function  get_genero(){
          $gen = Genero::find()->all();

          $gen = ArrayHelper::map($gen, 'id_genero', 'genero');

          return $gen;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasMany(Funcionario::className(), ['id_genero' => 'id_genero']);
    }
}
