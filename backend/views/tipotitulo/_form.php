<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipotitulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipotitulo-form">

   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipotitulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vr_hora')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
