<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\select2\Select2; 
use yii\helpers\ArrayHelper;
use backend\models\Funcionario;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ContratoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contrato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   
    
    <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

      
   

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'id_escalafon') ?>

    <?php // echo $form->field($model, 'cargo') ?>

    <?php // echo $form->field($model, 'numero_cuenta') ?>

    <?php // echo $form->field($model, 'asignacion_mensual') ?>

    <?php // echo $form->field($model, 'vr_hora') ?>

    <?php // echo $form->field($model, 'total_horas') ?>

    <?php // echo $form->field($model, 'horas_catedra') ?>

    <?php // echo $form->field($model, 'horas_sustentacion') ?>

    <?php // echo $form->field($model, 'horas_examenes_finales') ?>

    <?php // echo $form->field($model, 'horas_reunion') ?>

    <?php // echo $form->field($model, 'horas_trabajo_de_grado') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Resetear'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
