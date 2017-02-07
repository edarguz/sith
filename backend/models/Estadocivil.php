<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "estadocivil".
 *
 * @property string $id_estado_civil
 * @property string $estado_civil
 *
 * @property Funcionario[] $funcionarios
 */
class Estadocivil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estadocivil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_civil'], 'required'],
            [['estado_civil'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado_civil' => Yii::t('app', 'Id Estado Civil'),
            'estado_civil' => Yii::t('app', 'Estado Civil'),
        ];
    }

    public static  function  get_estadocivil(){
          $ar = Estadocivil::find()->all();

          $ar = ArrayHelper::map($ar, 'id_estado_civil', 'estado_civil');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasMany(Funcionario::className(), ['id_estado_civil' => 'id_estado_civil']);
    }
}
