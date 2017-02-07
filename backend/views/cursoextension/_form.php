<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cursoextension */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursoextension-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'curso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_facultad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
