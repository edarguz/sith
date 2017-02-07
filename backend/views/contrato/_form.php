<?php

use yii\helpers\Html; 
use yii\widgets\ActiveForm; 
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Funcionario;
use backend\models\Area;
use backend\models\Cargo;
use backend\models\Escalafon;
use backend\models\Fondosalud;
use backend\models\Fondopensiones;
use backend\models\Arl;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;
use yii\web\JsExpression;




/* @var $this yii\web\View */
/* @var $model backend\models\Contrato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contrato-form">

     <?php $form = ActiveForm::begin(); ?>

     <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-edit"> </i> Contratos Unimayor </h4></div>

    <div class="panel-body">

    <?= 

    $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

      

    <?= $form->field($model, 'num_resolucion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_area')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Area::find()->all(), 'id_area', 'area'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione area...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

   <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Elija la fecha de inicio del contrato..'],
	    'language' => 'es',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy/mm/dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'fecha_fin')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Elija la fecha fin del contrato...'],
	    'language' => 'es',
            'pluginOptions' => [
               'autoclose'=>true,
               'format' => 'yyyy/mm/dd'
            ]
        ]);
    ?>

    <?= $form->field($model, 'id_escalafon')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Escalafon::find()->all(), 'id_escalafon', 'escalafon'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione escalafon...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

   <?= $form->field($model, 'id_cargo')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Cargo::find()->all(), 'id_cargo', 'cargo'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione cargo...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_fondosalud')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Fondosalud::find()->all(), 'id_fondo_salud', 'fondo_salud'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione fondo de salud...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_fondopensiones')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Fondopensiones::find()->all(), 'id_fondo_pensiones', 'fondo_pensiones'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione fondo de pensión...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'id_arl')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Arl::find()->all(), 'id_arl', 'arl'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione fondo de riesgos...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>

    <?= $form->field($model, 'valor_contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vr_hora')->textInput() ?>



   
    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    </div>
     </div>
      </div>
       </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



