<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "semestre".
 *
 * @property string $id_semestre
 * @property string $semestre
 *
 * @property Modulo[] $modulos
 */
class Semestre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semestre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semestre'], 'required'],
            [['semestre'], 'unique'],
            [['semestre'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_semestre' => Yii::t('app', 'Id Semestre'),
            'semestre' => Yii::t('app', 'Semestre'),
        ];
    }

     public static  function  get_semestre(){
          $ar = Semestre::find()->all();

          $ar = ArrayHelper::map($ar, 'id_semestre', 'semestre');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModulo()
    {
        return $this->hasMany(Modulo::className(), ['id_semestre' => 'id_semestre']);
    }
}
