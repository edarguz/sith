<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Programa;
use backend\models\Semestre;


/* @var $this yii\web\View */
/* @var $model backend\models\Modulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'modulo')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'id_programa', ['labelOptions'=>['style'=>'color:green']] )->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Programa::find()->orderBy('programa')->asArray()->all(), 'id_programa', 'programa'),
                    'language' => 'es',
                    'pluginOptions' => ['highlight'=>true],
                    'options' => ['placeholder' => 'Seleccione programa...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
               
    ?>

    <?= $form->field($model, 'creditos')->textInput() ?>
 
     

     

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
