<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Funcionario;
use backend\models\Modulo;
use backend\models\Facultad;
use backend\models\Periodoacademico;
use backend\models\Programa;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LabordocenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="labordocente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_periodo_academico')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Periodoacademico::find()->all(), 'id_periodo_academico', 'periodo'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione título...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_funcionario', ['labelOptions'=>['style'=>'color:orange']])->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_facultad')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Facultad::find()->all(), 'id_facultad', 'facultad'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione Facultad...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_programa')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Programa::find()->all(), 'id_programa', 'programa'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione programa...'],
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
