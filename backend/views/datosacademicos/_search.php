<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Funcionario;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\date\DatePicker;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\search\DatosacademicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datosacademicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>


     
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
