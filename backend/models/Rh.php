<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "rh".
 *
 * @property string $id_rh
 * @property string $rh
 *
 * @property Funcionario[] $funcionarios
 */
class Rh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rh'], 'required'],
            [['rh'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rh' => Yii::t('app', 'Id Rh'),
            'rh' => Yii::t('app', 'Rh'),
        ];
    }

    public static  function  get_factorsanguineo(){
          $ar = Rh::find()->all();

          $ar = ArrayHelper::map($ar, 'id_rh', 'rh');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasMany(Funcionario::className(), ['id_rh' => 'id_rh']);
    }
}
