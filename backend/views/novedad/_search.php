<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Tiponovedad;
use backend\models\Funcionario;
use yii\bootstrap\Modal;



/* @var $this yii\web\View */
/* @var $model backend\models\search\NovedadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="novedad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tipo_novedad')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Tiponovedad::find()->all(), 'id_tipo_novedad', 'tipo_novedad'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione tipo novedad...'],
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
