<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Funcionario;
use kartik\select2\Select2; 
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\search\DatosfamiliaresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datosfamiliares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'identificacion','nombres'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'genero')->widget(Select2::classname(), [
        'data' => ["Femenino" => "Femenino", "Masculino" => "Masculino"],
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione genero...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
