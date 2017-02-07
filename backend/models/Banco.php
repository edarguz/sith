<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "banco".
 *
 * @property string $id_banco
 * @property string $banco
 *
 * @property Contrato[] $contratos
 */
class Banco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banco'], 'required'],
             [['banco'], 'unique'],
            [['banco'], 'string', 'max' => 30]
        ];
    }

    public static  function  get_banco(){
          $ar = Banco::find()->all();

          $ar = ArrayHelper::map($ar, 'id_banco', 'banco');

          return $ar;

    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => Yii::t('app', 'Id Banco'),
            'banco' => Yii::t('app', 'Banco'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasMany(Contrato::className(), ['id_banco' => 'id_banco']);
    }
}
