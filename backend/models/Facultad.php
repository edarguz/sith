<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "facultad".
 *
 * @property string $id_facultad
 * @property string $facultad
 *
 * @property Cursoextension[] $cursoextensions
 * @property Labordocente[] $labordocentes
 * @property Programa[] $programas
 */
class Facultad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facultad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facultad'], 'required'],
            [['facultad'], 'unique'],
            [['facultad'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_facultad' => Yii::t('app', 'Id Facultad'),
            'facultad' => Yii::t('app', 'Facultad'),
        ];
    }

    public static  function  get_facultad(){
          $cat = Facultad::find()->all();

          $cat = ArrayHelper::map($cat, 'id_facultad', 'facultad');

          return $cat;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoextension()
    {
        return $this->hasMany(Cursoextension::className(), ['id_facultad' => 'id_facultad']);
    }

   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabordocente()
    {
        return $this->hasMany(Labordocente::className(), ['id_facultad' => 'id_facultad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma()
    {
        return $this->hasMany(Programa::className(), ['id_facultad' => 'id_facultad']);
    }
}