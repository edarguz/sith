<?php

namespace backend\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property string $id_area
 * @property string $area
 *
 * @property Contrato[] $contratos
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area'], 'required'],
            [['area'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_area' => Yii::t('app', 'Id Area'),
            'area' => Yii::t('app', 'Area'),
        ];
    }

    public static  function  get_area(){
          $ar = Area::find()->all();

          $ar = ArrayHelper::map($ar, 'id_area', 'area');

          return $ar;

    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_area' => 'id_area']);
    }
}
