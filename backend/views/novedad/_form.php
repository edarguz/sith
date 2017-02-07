<?php

use yii\helpers\Html; 
use yii\widgets\ActiveForm; 
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\widgets\DatePicker; 
use backend\models\Funcionario;
use backend\models\Tiponovedad;
use yii\bootstrap\Modal;
use kartik\select2\Select2Asset;

Select2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\Novedad */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="novedad-form">

   <?php $form = ActiveForm::begin([
        'id' => 'novedad-form',
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
                        $.pjax.reload({container:"#novedad-grid"});
                    });
                    return false;
                }).on("submit", function(e){
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    return false;
                });
            ');
        ?>



    <?= $form->field($model, 'id_tipo_novedad')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Tiponovedad::find()->all(), 'id_tipo_novedad', 'tipo_novedad'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione tipo novedad...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>



    <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Elija la fecha de inicio de la novedad...'],
            'language' => 'es',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy/mm/dd'

              
            ]
        ]);
    ?>

    <?= $form->field($model, 'fecha_fin')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Elija la fecha fin de la novedad...'],
            'language' => 'es',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy/mm/dd'

               
            ]
        ]);
    ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

     
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
