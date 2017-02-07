<?php

namespace backend\models;
use kartik\select2\Select2; 
use Yii;

/**
 * This is the model class for table "novedad".
 *
 * @property string $id_novedad
 * @property string $id_tipo_novedad
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $id_funcionario
 *
 * @property Funcionario $idFuncionario
 * @property Tiponovedad $idTipoNovedad
 */
class Novedad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'novedad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_novedad', 'fecha_inicio', 'fecha_fin', 'id_funcionario'], 'required'],
            [['id_tipo_novedad', 'id_funcionario'], 'integer'],
            [['observaciones'], 'string'],
            [['fecha_inicio', 'fecha_fin'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_novedad' => Yii::t('app', 'Id Novedad'),
            'id_tipo_novedad' => Yii::t('app', 'Novedad'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'id_funcionario' => Yii::t('app', 'Funcionario'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoNovedad()
    {
        return $this->hasOne(Tiponovedad::className(), ['id_tipo_novedad' => 'id_tipo_novedad']);
    }
}
