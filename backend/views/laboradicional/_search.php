<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Funcionario;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\date\DatePicker;
use backend\models\Programa;
use backend\models\Modulo;
use backend\models\Tipotitulo;
use backend\models\Facultad;


/* @var $this yii\web\View */
/* @var $model backend\models\search\LaboradicionalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laboradicional-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

  
    <div class="form">

    <div class="panel panel-success">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-search"> </i> Buscar labor Adicional </h4></div>

    <div class="panel-body">


   <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    
   <?= $form->field($model, 'id_tipotitulo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Tipotitulo::find()->all(), 'id_tipotitulo', 'tipotitulo'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione título...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_facultad')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Facultad::find()->all(), 'id_facultad', 'facultad'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione facultad...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

       
    <?php // echo $form->field($model, 'id_modulo') ?>

    <?php // echo $form->field($model, 'horas_sem') ?>

    <?php // echo $form->field($model, 'id_tipotulo') ?>

    <?php // echo $form->field($model, 'vr_hora') ?>

    </div>
     </div>
      </div>
       </div>
       <br>

 
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-danger']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
