<?php

namespace backend\models;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "programa".
 *
 * @property string $id_programa
 * @property string $programa
 * @property string $id_facultad
 *
 * @property Facultad $idFacultad
 */
class Programa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['programa', 'id_facultad'], 'required'],
            [['programa'], 'unique'],
            [['id_facultad'], 'integer'],
            [['programa'], 'string', 'max' => 80]
        ];
    }

    public static  function  get_programa(){
          $ar = Programa::find()->all();

          $ar = ArrayHelper::map($ar, 'id_programa', 'programa');

          return $ar;

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_programa' => Yii::t('app', 'Id Programa'),
            'programa' => Yii::t('app', 'Programa'),
            'id_facultad' => Yii::t('app', 'Facultad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacultad()
    {
        return $this->hasOne(Facultad::className(), ['id_facultad' => 'id_facultad']);
    }
}
