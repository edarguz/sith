<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "fondosalud".
 *
 * @property string $id_fondo_salud
 * @property string $fondo_salud
 *
 * @property Contrato[] $contratos
 */
class Fondosalud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fondosalud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fondo_salud'], 'required'],
            [['fondo_salud'], 'unique'],
            [['fondo_salud'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fondo_salud' => Yii::t('app', 'Id Fondo Salud'),
            'fondo_salud' => Yii::t('app', 'Fondo Salud'),
        ];
    }

    public static  function  get_fsalud(){
          $fs = Fondosalud::find()->all();

          $fs = ArrayHelper::map($fs, 'id_fondo_salud', 'fondo_salud');

          return $fs;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_fondosalud' => 'id_fondo_salud']);
    }
}
