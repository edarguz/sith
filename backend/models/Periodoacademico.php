<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "periodoacademico".
 *
 * @property string $id_periodo_academico
 * @property string $periodo
 *
 * @property Programa[] $programas
 */
class Periodoacademico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodoacademico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periodo'], 'required'],
            [['periodo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_periodo_academico' => Yii::t('app', 'Id Periodo Academico'),
            'periodo' => Yii::t('app', 'Periodo'),
        ];
    }

    public static  function  get_pacademico(){
          $cat = Periodoacademico::find()->all();

          $cat = ArrayHelper::map($cat, 'id_periodo_academico', 'periodo');

          return $cat;

    }

    public static  function  get_periodo(){
           $periodo = Periodoacademico::find()->where(['id_periodo_academico'=>3])->orderBy('periodo')->all();

          $periodo = ArrayHelper::map($periodo, 'id_periodo_academico', 'periodo');

          return $periodo;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma()
    {
        return $this->hasMany(Programa::className(), ['id_periodo_academico' => 'id_periodo_academico']);
    }
}
