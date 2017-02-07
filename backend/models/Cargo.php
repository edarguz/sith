<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property string $id_cargo
 * @property string $cargo
 *
 * @property Contrato[] $contratos
 * @property Laborcontratista[] $laborcontratistas
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo'], 'required'],
            [['cargo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cargo' => Yii::t('app', 'Id Cargo'),
            'cargo' => Yii::t('app', 'Cargo'),
        ];
    }

    public static  function  get_cargo(){
          $ar = Cargo::find()->all();

          $ar = ArrayHelper::map($ar, 'id_cargo', 'cargo');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_cargo' => 'id_cargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaborcontratista()
    {
        return $this->hasMany(Laborcontratista::className(), ['id_cargo' => 'id_cargo']);
    }
}
