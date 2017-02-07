<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "laborcontratista".
 *
 * @property string $id_contratista
 * @property string $num_contrato
 * @property string $id_funcionario
 * @property string $valor_contrato
 * @property integer $cdp
 * @property string $fecha_cdp
 * @property string $fecha_suscripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $fecha_registro
 * @property string $objeto
 * @property string $actividades
 * @property string $id_tipotitulo
 * @property string $id_cargo
 * @property string $supervisor
 * @property string $id_area
 * @property string $forma_pago
 * @property integer $num_cuotas
 * @property string $id_fondosalud
 * @property string $id_arl
 * @property string $id_fondopensiones
 *
 * @property Cargo $cargo
 * @property Area $area
 * @property Arl $arl
 * @property Fondopensiones $fondopensiones
 * @property Fondosalud $fondosalud
 * @property Funcionario $funcionario
 * @property Tipotitulo $tipotitulo
 */
class Laborcontratista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laborcontratista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_contrato', 'id_cargo','id_area','id_funcionario', 'id_tipotitulo','valor_contrato', 'cdp', 'fecha_cdp', 'fecha_suscripcion', 'fecha_inicio', 'fecha_fin', 'fecha_registro', 'objeto', 'actividades', 'supervisor', 'forma_pago', 'num_cuotas', 'id_fondosalud', 'id_arl', 'id_fondopensiones'], 'required', 'message' => 'Campo requerido'],
            [['id_funcionario', 'valor_contrato', 'id_tipotitulo', 'id_cargo', 'id_area', 'num_cuotas', 'id_fondosalud', 'id_arl', 'id_fondopensiones'], 'integer', 'message' => 'El valor debe ser numémico'],
            [['num_contrato'], 'unique','targetAttribute' => ['num_contrato'], 'message' => 'El campo ya existe'],

            [['fecha_cdp', 'fecha_suscripcion', 'fecha_inicio', 'fecha_fin', 'fecha_registro'], 'safe'],
            [['objeto', 'actividades'], 'string'],
            [['num_contrato'], 'string', 'max' => 40],
            [['cdp'], 'string', 'max' => 11],
            [['supervisor', 'forma_pago'], 'string', 'max' => 60],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'id_cargo']],
            [['id_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['id_area' => 'id_area']],
            [['id_arl'], 'exist', 'skipOnError' => true, 'targetClass' => Arl::className(), 'targetAttribute' => ['id_arl' => 'id_arl']],
            [['id_fondopensiones'], 'exist', 'skipOnError' => true, 'targetClass' => Fondopensiones::className(), 'targetAttribute' => ['id_fondopensiones' => 'id_fondo_pensiones']],
            [['id_fondosalud'], 'exist', 'skipOnError' => true, 'targetClass' => Fondosalud::className(), 'targetAttribute' => ['id_fondosalud' => 'id_fondo_salud']],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id_funcionario']],
            [['id_tipotitulo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipotitulo::className(), 'targetAttribute' => ['id_tipotitulo' => 'id_tipotitulo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contratista' => Yii::t('app', 'Id Contratista'),
            'num_contrato' => Yii::t('app', 'Número Contrato'),
            'id_funcionario' => Yii::t('app', 'Funcionario'),
            'valor_contrato' => Yii::t('app', 'Valor Contrato'),
            'cdp' => Yii::t('app', 'CDP'),
            'fecha_cdp' => Yii::t('app', 'Fecha Cdp'),
            'fecha_suscripcion' => Yii::t('app', 'Fecha Suscripcion'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
            'objeto' => Yii::t('app', 'Objeto'),
            'actividades' => Yii::t('app', 'Actividades'),
            'id_tipotitulo' => Yii::t('app', 'Titulo'),
            'id_cargo' => Yii::t('app', 'Cargo'),
            'supervisor' => Yii::t('app', 'Supervisor'),
            'id_area' => Yii::t('app', 'Area'),
            'forma_pago' => Yii::t('app', 'Forma Pago'),
            'num_cuotas' => Yii::t('app', 'Número Cuotas'),
            'id_fondosalud' => Yii::t('app', 'Fondo de salud'),
            'id_arl' => Yii::t('app', 'Arl'),
            'id_fondopensiones' => Yii::t('app', 'Fondo de pensiones'),
        ];
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
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id_area' => 'id_area']);
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
    public function getTipotitulo()
    {
        return $this->hasOne(Tipotitulo::className(), ['id_tipotitulo' => 'id_tipotitulo']);
    }
}
