<?php

namespace backend\models;

use Yii;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "datosfamiliares".
 *
 * @property string $id_datos_fam
 * @property string $id_funcionario
 * @property string $nombres
 * @property string $apellidos
 * @property string $genero
 * @property string $edad
 *
 * @property Funcionario $idFuncionario


class Model extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = null)
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];
        $flag = false;

        if ($multipleModels !== null && is_array($multipleModels) && !empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
            $multipleModels = array_combine($keys, $multipleModels);
            $falg = true;
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
              if($flag) {
                if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])) {
                    $models[] = $multipleModels[$item['id']];
                } else {
                    $models[] = new $modelClass;
                }
               } else 
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
}


 */
class Datosfamiliares extends \yii\db\ActiveRecord
{

  
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datosfamiliares';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_funcionario', 'nombres', 'apellidos', 'genero', 'fecha_nacimiento'], 'required', 'message' => 'Campo requerido'],
            [['id_funcionario'], 'integer'],
            [['fecha_nacimiento'], 'safe'],
            [['nombres'], 'string', 'max' => 60],
            [['apellidos'], 'string', 'max' => 60],
            [['genero'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_datos_fam' => Yii::t('app', 'Id Datos Fam'),
            'id_funcionario' => Yii::t('app', 'Funcionario'),
            'nombres' => Yii::t('app', 'Nombres'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'genero' => Yii::t('app', 'Genero'),
            'fecha_nacimiento' => Yii::t('app', 'fecha de nacimiento'),
            'edad' => Yii::t('app', 'Edad'),
            'fullNombres' => Yii::t('app', 'Hijos')
        ];
    }

    public function getFullNombres() {
      return $this->nombres . ' ' . $this->apellidos;
    }

    public static  function  get_edad(){
          $fecha_actual = date("Y-m-d"); 
         
          return $fecha_actual;

    }

    public static  function  get_hijosName(){
          $nam = Datosfamiliares::find()->all();

          $nam = ArrayHelper::map($nam, 'id_datos_fam', 'nombres', 'apellidos');

          return $nam;

    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['id_funcionario' => 'id_funcionario']);
    }
}
