<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "tiponovedad".
 *
 * @property string $id_tipo_novedad
 * @property string $tipo_titulo
 *
 * @property Novedad[] $novedads
 */
class Tiponovedad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiponovedad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_novedad'], 'required'],
            [['tipo_novedad'], 'unique'],
            [['tipo_novedad'], 'string', 'max' => 50]
        ];
    }

    public static  function  get_tiponovedad(){
          $tnov = Tiponovedad::find()->all();

          $tnov = ArrayHelper::map($tnov, 'id_tipo_novedad', 'tipo_novedad');

          return $tnov;

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_novedad' => Yii::t('app', 'Id Tipo Novedad'),
            'tipo_novedad' => Yii::t('app', 'Tipo Novedad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNovedad()
    {
        return $this->hasMany(Novedad::className(), ['id_tipo_novedad' => 'id_tipo_novedad']);
    }
}
