<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Funcionario;
use backend\models\Programa;
use backend\models\Periodoacademico;
use backend\models\Jornada;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ModuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'modulo') ?>

     
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
       
    </div>

    <?php ActiveForm::end(); ?>

</div>
