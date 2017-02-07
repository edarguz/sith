<?php

namespace backend\models;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

use Yii;

/**
 * This is the model class for table "modulo".
 *
 * @property string $id_modulo
 * @property string $modulo
 * @property integer $creditos
 *
 * @property Labordocente[] $labordocentes
 */
class Modulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modulo', 'creditos'], 'required'],
            [['creditos', 'id_programa'], 'integer'],
            [['modulo'], 'string', 'max' => 90],
            [['id_programa'], 'exist', 'skipOnError' => true, 'targetClass' => Programa::className(), 'targetAttribute' => ['id_programa' => 'id_programa']],
        ];
    } 

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_modulo' => 'Id Modulo',
            'modulo' => 'Modulo',
            'creditos' => 'Creditos',
            'id_programa' => 'Programa',
        ];
    } 


     public static  function  get_modulo(){
          $ar = Modulo::find()->all();

          $ar = ArrayHelper::map($ar, 'id_modulo', 'modulo');

          return $ar;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getLaboradicional()
    {
        return $this->hasMany(Laboradicional::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabordocente()
    {
        return $this->hasMany(Labordocente::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma()
    {
        return $this->hasOne(Programa::className(), ['id_programa' => 'id_programa']);
    }
} 

