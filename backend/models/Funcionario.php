<?php

namespace backend\models;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property string $id_funcionario
 * @property string $nombres
 * @property string $apellidos
 * @property integer $identificacion
 * @property string $fecha_exp
 * @property string $lugar_expedicion
 * @property string $id_genero
 * @property string $id_tipo_funcionario
 * @property string $fecha_nac
 * @property string $lugar_nac
 * @property string $id_estado_civil
 * @property string $id_rh
 * @property string $direccion
 * @property string $telefono
 * @property string $tel_movil
 * @property string $email
 * @property string $estado
 *
 * @property Contrato[] $contratos
 * @property Datosacademicos[] $datosacademicos
 * @property Datosfamiliares[] $datosfamiliares
 * @property Estadocivil $idEstadoCivil
 * @property Genero $idGenero
 * @property Rh $idRh
 * @property Tipofuncionario $idTipoFuncionario
 * @property Laboradicional[] $laboradicionals
 * @property Laborcontratista[] $laborcontratistas
 * @property Labordocente[] $labordocentes
 * @property Novedad[] $novedads
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos', 'identificacion', 'id_genero', 'fecha_exp', 'lugar_expedicion','id_tipo_funcionario', 'fecha_nac', 'lugar_nac', 'id_estado_civil', 'id_rh', 'direccion', 'tel_movil', 'email'], 'required', 'message' => 'Campo requerido'],
            [['identificacion', 'id_genero', 'tel_movil','id_tipo_funcionario', 'id_estado_civil', 'id_rh','id_banco'], 'integer', 'message' => 'El campo debe ser numérico'],
            [['identificacion'], 'unique', 'targetAttribute' => ['identificacion'], 'message' => 'El número ya existe'],
            [['numero_cuenta'], 'string', 'max' => 30],
            [['fecha_exp', 'fecha_nac', 'id_banco', 'numero_cuenta'], 'safe'],
            [['nombres', 'apellidos'], 'string', 'max' => 40],
            [['lugar_expedicion', 'telefono'], 'string', 'max' => 30],
            [['lugar_nac'], 'string', 'max' => 20],
            [['direccion', 'email'], 'string', 'max' => 50],
            [['email'] ,'email', 'message' => 'No es una dirección válida para email'],
            [['tel_movil'], 'string', 'max' => 12],
            [['estado'], 'string', 'max' => 15],
            [['id_estado_civil'], 'exist', 'skipOnError' => true, 'targetClass' => Estadocivil::className(), 'targetAttribute' => ['id_estado_civil' => 'id_estado_civil']],
            [['id_genero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['id_genero' => 'id_genero']],
            [['id_rh'], 'exist', 'skipOnError' => true, 'targetClass' => Rh::className(), 'targetAttribute' => ['id_rh' => 'id_rh']],
            [['id_tipo_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Tipofuncionario::className(), 'targetAttribute' => ['id_tipo_funcionario' => 'id_tipo_funcionario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_funcionario' => Yii::t('app', 'Funcionario'),
            'nombres' => Yii::t('app', 'Nombre Funcionario'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'identificacion' => Yii::t('app', 'Identificacion'),
            'fecha_exp' => Yii::t('app', 'Fecha Expedicion C.C'),
            'lugar_expedicion' => Yii::t('app', 'Lugar Expedición'),
            'id_genero' => Yii::t('app', 'Genero'),
            'id_tipo_funcionario' => Yii::t('app', 'Tipo Funcionario'),
            'fecha_nac' => Yii::t('app', 'Fecha Nacimiento'),
            'lugar_nac' => Yii::t('app', 'Lugar Nacimiento'),
            'id_estado_civil' => Yii::t('app', 'Estado Civil'),
            'id_rh' => Yii::t('app', 'Rh'),
            'id_banco' => Yii::t('app', 'Banco'),
            'numero_cuenta' => Yii::t('app', 'Numero Cuenta'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'tel_movil' => Yii::t('app', 'Tel Movil'),
            'email' => Yii::t('app', 'Email'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    public function getFullName() {
      return $this->nombres . ' ' . $this->apellidos;
    }


    
    public static  function  get_edad(){
      $fecha_actual = date("Y-m-d"); 
          return $fecha_actual;
    }

    public static  function  get_funcionario(){
          $func = Funcionario::find()->all();
          $func = ArrayHelper::map($func, 'id_funcionario', 'identificacion');

          return $func;

    }

    public static  function  get_funcionarioName(){
          $nam = Funcionario::find()->orderBy('nombres')->all();
          $nam = ArrayHelper::map($nam, 'id_funcionario', 'fullName');

          return $nam;

    }

    public static  function  get_funcionarioApe(){
          $ap = Funcionario::find()->all();
          $ap = ArrayHelper::map($ap, 'id_funcionario', 'apellidos');

          return $ap;

    }





    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContrato()
    {
        return $this->hasMany(Contrato::className(), ['id_funcionario' => 'id_funcionario']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanco()
    {
        return $this->hasOne(Banco::className(), ['id_banco' => 'id_banco']);
    }

       /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosacademicos()
    {
        return $this->hasMany(Datosacademicos::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosfamiliares()
    {
        return $this->hasMany(Datosfamiliares::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadocivil()
    {
        return $this->hasOne(Estadocivil::className(), ['id_estado_civil' => 'id_estado_civil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Genero::className(), ['id_genero' => 'id_genero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRh()
    {
        return $this->hasOne(Rh::className(), ['id_rh' => 'id_rh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoFuncionario()
    {
        return $this->hasOne(Tipofuncionario::className(), ['id_tipo_funcionario' => 'id_tipo_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaboradicional()
    {
        return $this->hasMany(Laboradicional::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLaborcontratista()
    {
        return $this->hasMany(Laborcontratista::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabordocente()
    {
        return $this->hasMany(Labordocente::className(), ['id_funcionario' => 'id_funcionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNovedad()
    {
        return $this->hasMany(Novedad::className(), ['id_funcionario' => 'id_funcionario']);
    }

    public function beforeSave($insert) 
    {
      parent::beforeSave($insert);
      if($insert)
        $this->estado=1;
      return true;
    }
}
