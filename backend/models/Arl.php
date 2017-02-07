<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "arl".
 *
 * @property string $id_arl
 * @property string $arl
 *
 * @property Contrato[] $contratos
 */
class Arl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arl'], 'required'],
            [['arl'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_arl' => Yii::t('app', 'Id Arl'),
            'arl' => Yii::t('app', 'Arl'),
        ];
    }

    public static  function  get_adminriesgos(){
          $ar = Arl::find()->all();

          $ar = ArrayHelper::map($ar, 'id_arl', 'arl');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContratos()
    {
        return $this->hasMany(Contrato::className(), ['id_arl' => 'id_arl']);
    }
}
