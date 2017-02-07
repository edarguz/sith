<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "laboradicional".
 *
 * @property string $id_laboradicional
 * @property string $id_funcionario
 * @property string $id_programa
 * @property string $id_facultad
 * @property string $id_semestre
 * @property string $id_modulo
 * @property string $horas_sem
 * @property string $id_tipotitulo
 * @property string $vr_hora
 *
 * @property Contrato[] $contratos
 * @property Facultad $idFacultad
 * @property Funcionario $idFuncionario
 * @property Modulo $idModulo
 * @property Programa $idPrograma
 * @property Semestre $idSemestre
 * @property Tipotitulo $idTipotitulo
 */
class Laboradicional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laboradicional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'id_programa', 'id_facultad', 'id_semestre', 'fecha_inicio', 'fecha_fin', 'id_modulo', 'horas_sem', 'id_periodo_academico', 'id_tipotitulo', 'vr_hora'], 'required', 'message' => 'Campo requerido'],
            [['id_funcionario', 'id_programa', 'id_facultad', 'vr_semestre', 'id_semestre', 'id_modulo', 'horas_sem', 'id_tipotitulo', 'vr_hora'], 'integer', 'message' => 'el valor no es numérico'],
            [['id_facultad'], 'exist', 'skipOnError' => true, 'targetClass' => Facultad::className(), 'targetAttribute' => ['id_facultad' => 'id_facultad']],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id_funcionario']],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['id_modulo' => 'id_modulo']],
            [['id_programa'], 'exist', 'skipOnError' => true, 'targetClass' => Programa::className(), 'targetAttribute' => ['id_programa' => 'id_programa']],
            [['id_semestre'], 'exist', 'skipOnError' => true, 'targetClass' => Semestre::className(), 'targetAttribute' => ['id_semestre' => 'id_semestre']],
            [['id_tipotitulo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipotitulo::className(), 'targetAttribute' => ['id_tipotitulo' => 'id_tipotitulo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_laboradicional' => Yii::t('app', 'Id Laboradicional'),
            'id_periodo_academico' => Yii::t('app', 'Periodo Academico'),
            'id_funcionario' => Yii::t('app', 'Docente'),
            'id_programa' => Yii::t('app', 'Programa'),
            'id_facultad' => Yii::t('app', 'Facultad'),
            'id_semestre' => Yii::t('app', 'Semestre'),
            'id_modulo' => Yii::t('app', 'Módulo'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'horas_sem' => Yii::t('app', 'Horas Semestre'),
            'id_tipotitulo' => Yii::t('app', 'Tipotitulo'),
            'vr_hora' => Yii::t('app', 'Vr Hora'),
            'vr_semestre' => Yii::t('app', 'Valor semestre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_laboradicional' => 'id_laboradicional']);
    }

    public function getPeriodoAcademico()
    {
        return $this->hasOne(Periodoacademico::className(), ['id_periodo_academico' => 'id_periodo_academico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacultad()
    {
        return $this->hasOne(Facultad::className(), ['id_facultad' => 'id_facultad']);
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
    public function getModulo()
    {
        return $this->hasOne(Modulo::className(), ['id_modulo' => 'id_modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma()
    {
        return $this->hasOne(Programa::className(), ['id_programa' => 'id_programa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemestre()
    {
        return $this->hasOne(Semestre::className(), ['id_semestre' => 'id_semestre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipotitulo()
    {
        return $this->hasOne(Tipotitulo::className(), ['id_tipotitulo' => 'id_tipotitulo']);
    }


     public function vr_horaAdicional()
    {   
        // Se definen los valores de la hora adicional para docentes de diplomados, seminarios y especializaciones

        $valorad=$this->vr_hora;

        if ($this->id_tipotitulo == 3)
        {
            $valor='56549';
        } elseif ($this->id_tipotitulo == 4) {
            $valor='75398';
        } elseif ($this->id_tipotitulo == 5) {
            $valor='87964';
        } elseif ($this->id_tipotitulo == 7) {
            $valor='106814';
        } elseif ($this->id_tipotitulo == 10) {
            $valor='125664';
        } elseif ($this->id_tipotitulo == 9) {
            $valor='56549';
        } elseif ($this->id_tipotitulo == 11) {
            $valor='56549';
        }

        return $valor;

    }

    
    public function beforeSave($insert)
    {
        
        $this->vr_hora = $this->vr_horaAdicional();
        $this->vr_semestre = $this->horas_sem * $this->vr_hora;

       

        return true;
    }


}
