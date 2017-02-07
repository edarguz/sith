<?php

namespace backend\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "tipotitulo".
 *
 * @property string $id_tipotitulo
 * @property string $tipotitulo
 * @property string $vr_hora
 *
 * @property Datosacademicos[] $datosacademicos
 * @property Labordocente[] $labordocentes
 */
class Tipotitulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipotitulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipotitulo'], 'required'],
            [['vr_hora'], 'integer'],
            [['tipotitulo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipotitulo' => Yii::t('app', 'Id Tipotitulo'),
            'tipotitulo' => Yii::t('app', 'Tipo titulo'),
            'vr_hora' => Yii::t('app', 'Vr Hora'),
        ];
    }


    public static  function  get_tipotitulo(){
          $ar = Tipotitulo::find()->all();

          $ar = ArrayHelper::map($ar, 'id_tipotitulo', 'tipotitulo');

          return $ar;

    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosacademicos()
    {
        return $this->hasMany(Datosacademicos::className(), ['id_titulo' => 'id_tipotitulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabordocente()
    {
        return $this->hasMany(Labordocente::className(), ['id_tipotitulo' => 'id_tipotitulo']);
    }

    public function getLaboradicional()
    {
        return $this->hasMany(Labaoradicional::className(), ['id_tipotitulo' => 'id_tipotitulo']);
    }
}
