<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contrato".
 *
 * @property string $id_contrato
 * @property string $id_funcionario
 * @property string $num_resolucion
 * @property string $id_area
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $id_escalafon
 * @property string $id_cargo
 * @property double $valor_contrato
 * @property integer $vr_hora
 * @property string $observaciones
 * @property string $id_labor
 * @property string $id_laboradicional
 * @property string $id_fondosalud
 * @property string $id_arl
 * @property string $id_fondopensiones
 *
 * @property Arl $arl
 * @property Area $area
 * @property Cargo $cargo
 * @property Escalafon $escalafon
 * @property Fondopensiones $fondopensiones
 * @property Fondosalud $fondosalud
 * @property Funcionario $funcionario
 * @property Laboradicional $laboradicional
 * @property Labordocente $labor
 */
class Contrato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contrato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'num_resolucion', 'id_area', 'fecha_inicio', 'fecha_fin', 'id_escalafon', 'id_cargo', 'valor_contrato', 'vr_hora'], 'required', 'message' => 'Campo requerido'],
            [['id_funcionario', 'id_area', 'id_escalafon', 'id_cargo', 'vr_hora', 'id_labor', 'id_laboradicional', 'id_fondosalud', 'id_arl', 'id_fondopensiones'], 'integer','message'=>'El campo debe ser numérico'],
            [['num_resolucion'], 'unique','targetAttribute' => ['num_resolucion'], 'message' => 'El campo ya existe'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['valor_contrato'], 'number','message'=>'El campo debe ser numérico'],
            [['observaciones'], 'string'],
            [['num_resolucion'], 'string', 'max' => 30],
            [['id_arl'], 'exist', 'skipOnError' => true, 'targetClass' => Arl::className(), 'targetAttribute' => ['id_arl' => 'id_arl']],
            [['id_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['id_area' => 'id_area']],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'id_cargo']],
            [['id_escalafon'], 'exist', 'skipOnError' => true, 'targetClass' => Escalafon::className(), 'targetAttribute' => ['id_escalafon' => 'id_escalafon']],
            [['id_fondopensiones'], 'exist', 'skipOnError' => true, 'targetClass' => Fondopensiones::className(), 'targetAttribute' => ['id_fondopensiones' => 'id_fondo_pensiones']],
            [['id_fondosalud'], 'exist', 'skipOnError' => true, 'targetClass' => Fondosalud::className(), 'targetAttribute' => ['id_fondosalud' => 'id_fondo_salud']],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id_funcionario']],
            [['id_laboradicional'], 'exist', 'skipOnError' => true, 'targetClass' => Laboradicional::className(), 'targetAttribute' => ['id_laboradicional' => 'id_laboradicional']],
            [['id_labor'], 'exist', 'skipOnError' => true, 'targetClass' => Labordocente::className(), 'targetAttribute' => ['id_labor' => 'id_labor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contrato' => Yii::t('app', 'Id Contrato'),
            'id_funcionario' => Yii::t('app', 'Funcionario'),
            'num_resolucion' => Yii::t('app', 'Número resolución'),
            'id_area' => Yii::t('app', 'Area'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'id_escalafon' => Yii::t('app', 'Escalafon'),
            'id_cargo' => Yii::t('app', 'Cargo'),
            'valor_contrato' => Yii::t('app', 'Valor Contrato'),
            'vr_hora' => Yii::t('app', 'Vr Hora'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'id_labor' => Yii::t('app', 'Labor docente'),
            'id_laboradicional' => Yii::t('app', 'Labor adicional'),
            'id_fondosalud' => Yii::t('app', 'Fondo de salud'),
            'id_arl' => Yii::t('app', 'Arl'),
            'id_fondopensiones' => Yii::t('app', 'Fondo de pensiones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArl()
    {
        return $this->hasOne(Arl::className(), ['id_arl' => 'id_arl']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id_area' => 'id_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id_cargo' => 'id_cargo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscalafon()
    {
        return $this->hasOne(Escalafon::className(), ['id_escalafon' => 'id_escalafon']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFondopensiones()
    {
        return $this->hasOne(Fondopensiones::className(), ['id_fondo_pensiones' => 'id_fondopensiones']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFondosalud()
    {
        return $this->hasOne(Fondosalud::className(), ['id_fondo_salud' => 'id_fondosalud']);
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
    public function getLaboradicional()
    {
        return $this->hasOne(Laboradicional::className(), ['id_laboradicional' => 'id_laboradicional']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabor()
    {
        return $this->hasOne(Labordocente::className(), ['id_labor' => 'id_labor']);
    }
}
