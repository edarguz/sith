<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\select2\Select2; 
use yii\helpers\ArrayHelper;
use backend\models\Tipofuncionario;
use backend\models\Funcionario;

/* @var $this yii\web\View */
/* @var $model backend\models\search\FuncionarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione tipo funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_tipo_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Tipofuncionario::find()->all(), 'id_tipo_funcionario', 'tipo_funcionario'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione tipo funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'identificacion') ?>

   

    <?php // echo $form->field($model, 'lugar_expedicion') ?>

    <?php // echo $form->field($model, 'id_genero') ?>

    <?php // echo $form->field($model, 'id_tipo_funcionario') ?>

    <?php // echo $form->field($model, 'id_fondopensiones') ?>

    <?php // echo $form->field($model, 'id_arl') ?>

    <?php // echo $form->field($model, 'id_fondosalud') ?>

    <?php // echo $form->field($model, 'id_banco') ?>

    <?php // echo $form->field($model, 'fecha_nac') ?>

    <?php // echo $form->field($model, 'lugar_nac') ?>

    <?php // echo $form->field($model, 'id_estado_civil') ?>

    <?php // echo $form->field($model, 'id_rh') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'tel_movil') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
