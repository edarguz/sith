<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 

/* @var $this yii\web\View */
/* @var $model backend\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form">

    <?php $form = ActiveForm::begin([
        'id' => 'contrato-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
    ]); ?>

    <?php
        $this->registerJs('
            // obtener la id del formulario y establecer el manejador de eventos
                $("form#solicitante-form").on("beforeSubmit", function(e) {
                    var form = $(this);
                    $.post(
                        form.attr("action")+"&submit=true",
                        form.serialize()
                    )
                    .done(function(result) {
                        form.parent().html(result.message);
                        $.pjax.reload({container:"#area-grid"});
                    });
                    return false;
                }).on("submit", function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    return false;
                });
            ');
        ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
