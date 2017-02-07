<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "jornada".
 *
 * @property string $id_jornada
 * @property string $jornada
 *
 * @property Modulo[] $modulos
 * @property Programa[] $programas
 */
class Jornada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jornada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jornada'], 'required'],
            [['jornada'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jornada' => Yii::t('app', 'Id Jornada'),
            'jornada' => Yii::t('app', 'Jornada'),
        ];
    }

    public static  function  get_jornada(){
          $cat = Jornada::find()->all();

          $cat = ArrayHelper::map($cat, 'id_jornada', 'jornada');

          return $cat;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabordocente()
    {
        return $this->hasMany(Labordocente::className(), ['id_jornada' => 'id_jornada']);
    }
}
