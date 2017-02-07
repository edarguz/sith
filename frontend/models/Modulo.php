<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modulo".
 *
 * @property string $id_modulo
 * @property string $modulo
 * @property integer $creditos
 * @property string $id_programa
 *
 * @property Laboradicional[] $laboradicionals
 * @property Labordocente[] $labordocentes
 * @property Programa $programa
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
            'id_programa' => 'Id Programa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaboradicionals()
    {
        return $this->hasMany(Laboradicional::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabordocentes()
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
