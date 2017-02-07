<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-form">

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

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
