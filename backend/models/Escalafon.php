<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "escalafon".
 *
 * @property string $id_escalafon
 * @property string $escalafon
 *
 * @property Contrato[] $contratos
 */
class Escalafon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'escalafon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['escalafon'], 'required'],
            [['escalafon'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_escalafon' => Yii::t('app', 'Id Escalafon'),
            'escalafon' => Yii::t('app', 'Escalafon'),
        ];
    }

    public static  function  get_escalafon(){
          $ar = Escalafon::find()->all();

          $ar = ArrayHelper::map($ar, 'id_escalafon', 'escalafon');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_escalafon' => 'id_escalafon']);
    }
}
