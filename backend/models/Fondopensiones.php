<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;





/**
 * This is the model class for table "fondopensiones".
 *
 * @property string $id_fondo_pensiones
 * @property string $fondo_pensiones
 *
 * @property Contrato[] $contratos
 */
class Fondopensiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fondopensiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fondo_pensiones'], 'required'],
            [['fondo_pensiones'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fondo_pensiones' => Yii::t('app', 'Id Fondo Pensiones'),
            'fondo_pensiones' => Yii::t('app', 'Fondo Pensiones'),
        ];
    }

    public static  function  get_fpensiones(){
          $ar = Fondopensiones::find()->all();

          $ar = ArrayHelper::map($ar, 'id_fondo_pensiones', 'fondo_pensiones');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_fondopensiones' => 'id_fondo_pensiones']);
    }
}
