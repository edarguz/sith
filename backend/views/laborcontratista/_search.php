<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Funcionario;
use backend\models\Tipotitulo;
use backend\models\Jornada;
use kartik\widgets\DepDrop;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LaborcontratistaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laborcontratista-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

  
    

   <?= $form->field($model, 'fecha_inicio', ['labelOptions'=>['style'=>'color:black']])->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Elija la fecha de inicio del contrato..'],
        'language' => 'es',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy/mm/dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'fecha_fin', ['labelOptions'=>['style'=>'color:black']])->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Elija la fecha fin del contrato...'],
        'language' => 'es',
            'pluginOptions' => [
               'autoclose'=>true,
               'format' => 'yyyy/mm/dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'valor_contrato') ?>

    <?php // echo $form->field($model, 'id_tipotitulo') ?>

    <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    

    <?php // echo $form->field($model, 'cdp') ?>

    <?php // echo $form->field($model, 'fecha_cdp') ?>

    <?php // echo $form->field($model, 'plazo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
       
    </div>

    <?php ActiveForm::end(); ?>

</div>
