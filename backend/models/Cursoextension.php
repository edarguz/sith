<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cursoextension".
 *
 * @property string $id_curso_extension
 * @property string $curso
 * @property string $id_facultad
 *
 * @property Facultad $idFacultad
 */
class Cursoextension extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cursoextension';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso', 'id_facultad'], 'required'],
            [['id_facultad'], 'integer'],
            [['curso'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso_extension' => Yii::t('app', 'Id Curso Extension'),
            'curso' => Yii::t('app', 'Curso'),
            'id_facultad' => Yii::t('app', 'Id Facultad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultad()
    {
        return $this->hasOne(Facultad::className(), ['id_facultad' => 'id_facultad']);
    }
}
