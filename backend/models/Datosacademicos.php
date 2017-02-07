<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "datosacademicos".
 *
 * @property string $id_datos_acad
 * @property string $id_funcionario
 * @property string $id_titulo
 * @property string $titulo
 * @property string $institucion
 * @property string $fecha_titulo
 *
 * @property Funcionario $idFuncionario
 * @property Tipotitulo $idTitulo
 */
class Datosacademicos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datosacademicos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'id_titulo','titulo', 'institucion', 'fecha_titulo'], 'required', 'message' => 'Campo requerido'],
            [['id_funcionario', 'id_titulo'], 'integer'],
            [['fecha_titulo'], 'safe'],
            [['titulo', 'institucion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_datos_acad' => Yii::t('app', 'Id Datos Acad'),
            'id_funcionario' => Yii::t('app', 'Funcionario'),
            'id_titulo' => Yii::t('app', 'Título'),
            'titulo' => Yii::t('app', 'Nombre del título obtenido'),
            'institucion' => Yii::t('app', 'Institución'),
            'fecha_titulo' => Yii::t('app', 'Fecha Título'),
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
    public function getTipotitulo()
    {
        return $this->hasOne(Tipotitulo::className(), ['id_tipotitulo' => 'id_titulo']);
    }
}
