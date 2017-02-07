<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model backend\models\Escalafon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escalafon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'escalafon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
