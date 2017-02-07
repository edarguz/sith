<?php

namespace backend\models;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "labordocente".
 *
 * @property string $id_labor
 * @property string $id_facultad
 * @property string $id_programa
 * @property string $id_modulo
 * @property string $id_semestre
 * @property string $id_jornada
 * @property string $id_funcionario
 * @property string $id_tipotitulo
 * @property string $id_periodo_academico
 * @property double $horas_semanales
 * @property double $horas_trabajo_grado
 * @property double $horas_examenes_finales
 * @property double $horas_reunion_general
 * @property double $horas_reunion_facultad
 * @property double $horas_jurado_grado
 * @property string $vr_hora
 * @property string $observaciones
 *
 * @property Contrato[] $contratos
 * @property Facultad $idFacultad
 * @property Modulo $idModulo
 * @property Funcionario $idFuncionario
 * @property Jornada $idJornada
 * @property Periodoacademico $idPeriodoAcademico
 * @property Programa $idPrograma
 * @property Semestre $idSemestre
 * @property Tipotitulo $idTipotitulo
 */
class Labordocente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public $semanas;
   


    public static function tableName()
    {
        return 'labordocente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_facultad', 'id_programa', 'id_modulo', 'id_semestre', 'id_funcionario', 'id_jornada','fecha_inicio', 'fecha_fin', 'id_tipotitulo', 'id_periodo_academico', 'horas_semanales','horas_trabajo_grado', 'horas_examenes_finales', 'horas_reunion_general', 'horas_reunion_facultad', 'horas_jurado_grado'], 'required', 'message' => 'Campo requerido'],

            [['id_facultad', 'id_programa', 'id_modulo', 'id_semestre', 'id_jornada', 'id_funcionario', 'id_tipotitulo','id_periodo_academico', 'vr_hora'], 'integer'],
            [['horas_semanales', 'horas_trabajo_grado', 'total_horas_sem', 'horas_adic_contrato', 'horas_semestre', 'valor_semestre', 'horas_examenes_finales', 'horas_reunion_general', 'horas_reunion_facultad', 'horas_jurado_grado'], 'number', 'message' => 'El campo debe ser numérico'],
            [['observaciones'], 'string'],
            
            [['id_facultad'], 'exist', 'skipOnError' => true, 'targetClass' => Facultad::className(), 'targetAttribute' => ['id_facultad' => 'id_facultad']],
            [['id_modulo'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['id_modulo' => 'id_modulo']],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['id_funcionario' => 'id_funcionario']],
            [['id_jornada'], 'exist', 'skipOnError' => true, 'targetClass' => Jornada::className(), 'targetAttribute' => ['id_jornada' => 'id_jornada']],
            [['id_periodo_academico'], 'exist', 'skipOnError' => true, 'targetClass' => Periodoacademico::className(), 'targetAttribute' => ['id_periodo_academico' => 'id_periodo_academico']],
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
            'id_labor' => Yii::t('app', 'Id Labor'),
            'id_facultad' => Yii::t('app', 'Facultad'),
            'id_programa' => Yii::t('app', 'Programa'),
            'id_modulo' => Yii::t('app', 'Componente de módulo'),
            'id_semestre' => Yii::t('app', 'Semestre'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'id_jornada' => Yii::t('app', 'Grupo'),
            'id_funcionario' => Yii::t('app', 'Docente'),
            'id_tipotitulo' => Yii::t('app', 'Tipo titulo'),
            'id_periodo_academico' => Yii::t('app', 'Periodo Academico'),
            'horas_semanales' => Yii::t('app', 'Horas Semanales'),
            'horas_trabajo_grado' => Yii::t('app', 'Horas Trabajo Grado'),
            'total_horas_sem' => Yii::t('app', 'Total horas semana'),
            'horas_adic_contrato' => Yii::t('app', 'Horas adicionales al contrato'),
            'horas_examenes_finales' => Yii::t('app', 'Horas Examenes Finales'),
            'horas_reunion_general' => Yii::t('app', 'Horas Reunion General'),
            'horas_reunion_facultad' => Yii::t('app', 'Horas Reunion Facultad'),
            'horas_jurado_grado' => Yii::t('app', 'Horas Jurado Grado'),
            'vr_hora' => Yii::t('app', 'Vr Hora'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'dias_transcurridos' => Yii::t('app', '# Semanas'),
            'horas_semestre' => Yii::t('app', '# Horas semestre'),
            'valor_semestre' => Yii::t('app', 'valor semestre'),
        ];
    }

    

    public function getsemanas()
    {
        $dias   = (strtotime($this->fecha_inicio)-strtotime($this->fecha_fin))/86400;
        $dias   = abs($dias); $dias = floor($dias);  
        $dias   =  (round(($dias/30)-1))*4;  
        $semanas = $dias;

        return $semanas;
    }


    function total_horas()
    {
        $horas   = $this->horas_semanales + $this->horas_trabajo_grado;
        $this->total_horas_sem = $horas;
       
        return $horas;
    }

    function horas_adic_contrato()
    {

        $horas_ad   = ($this->horas_examenes_finales + $this->horas_reunion_general + $this->horas_reunion_facultad + $this->horas_jurado_grado);
           
        return $horas_ad;
    }

    public function horas_semestre()
        {

            $horas_sem = $this->horas_semanales;
            $horas_tgrado = $this->horas_trabajo_grado;
            

            $horas_sem   = (( $this->horas_semanales * $this->getsemanas()) + ($this->horas_trabajo_grado * $this->getsemanas()) + $this->horas_examenes_finales + $this->horas_reunion_general + $this->horas_reunion_facultad + $this->horas_jurado_grado);
               
          return $horas_sem;
    }

    function valor_semestre()
        {
           $valor_sem   = (($this->horas_semanales * $this->getsemanas()) + ($this->horas_trabajo_grado * $this->getsemanas()) + $this->horas_examenes_finales + $this->horas_reunion_general + $this->horas_reunion_facultad + $this->horas_jurado_grado) * ($this->vr_hora);
               
          return $valor_sem;
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_labor' => 'id_labor']);
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
    public function getModulo()
    {
        return $this->hasOne(Modulo::className(), ['id_modulo' => 'id_modulo']);
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
    public function getJornada()
    {
        return $this->hasOne(Jornada::className(), ['id_jornada' => 'id_jornada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoAcademico()
    {
        return $this->hasOne(Periodoacademico::className(), ['id_periodo_academico' => 'id_periodo_academico']);
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


    public function vr_hora()
    {

         // Se definen los valores de la hora docente para docentes de catedra

        $valor=$this->vr_hora;

        if ($this->id_tipotitulo == 3)
        {
            $valor='10208';
        } elseif ($this->id_tipotitulo == 4) {
            $valor='15122';
        } elseif ($this->id_tipotitulo == 5) {
            $valor='19096';
        } elseif ($this->id_tipotitulo == 7) {
            $valor='23252';
        } elseif ($this->id_tipotitulo == 10) {
            $valor='27014';
        } elseif ($this->id_tipotitulo == 9) {
            $valor='10208';
        } elseif ($this->id_tipotitulo == 11) {
            $valor='10208';        }
          elseif ($this->id_tipotitulo == 12) {
            $valor='0';
        }


        return $valor;

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipotitulo()
    {
        return $this->hasOne(Tipotitulo::className(), ['id_tipotitulo' => 'id_tipotitulo']);
    }

    public function beforeSave($insert)
    {
        $this->total_horas_sem = $this->total_horas();
        $this->horas_adic_contrato = $this->horas_adic_contrato();
        
        $this->horas_semestre = $this->horas_semestre();
        $this->vr_hora = $this->vr_hora();
        $this->valor_semestre = $this->valor_semestre();

       

        return true;
    }
}
