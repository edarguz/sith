<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Fondopensiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fondopensiones-form">

    <?php $form = ActiveForm::begin([
	    'id' => 'fondo_pensiones-form',
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
		                $.pjax.reload({container:"#fondo_pensiones-grid"});
		            });
		            return false;
		        }).on("submit", function(e){
		            e.preventDefault();
		            e.stopImmediatePropagation();
		            return false;
		        });
		    ');
	?>

    <?= $form->field($model, 'fondo_pensiones')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>

	


