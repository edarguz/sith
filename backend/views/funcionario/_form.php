<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;
use backend\models\Genero;
use backend\models\Rh;
use backend\models\Estadocivil;
use backend\models\Tipofuncionario;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\ActiveField;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;
use kartik\checkbox\CheckboxX;
use backend\models\Fondopensiones;
use backend\models\Banco;
use backend\models\Fondosalud;
use backend\models\Arl;
/* @var $this yii\web\View */
/* @var $model backend\models\Funcionario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionario-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); ?>

    <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"> </i> Funcionarios (Docentes, Docentes tiempo completo, docentes de planta y contratistas) </h4></div>

    <div class="panel-body">

   <?=

    FormGrid::widget(
    [
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
       
       'rows'=>[
           

                [
                'contentBefore'=>'<legend class="text-info"><small>Datos personales de trabajadores Unimayor</small></legend>',
                
                'attributes'=> [ 
                    'nombres'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombres...']],
                    'apellidos'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Apellidos...']],
                    ]
                ],

                
                [
                'attributes'=>[
                    'identificacion'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Identificación...']],
                    'fecha_exp'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                        'options' => [ 'pluginOptions' => ['format' => 'yyyy-mm-dd','todayHighlight' => true, 'autoclose'=>true,],],


                        ],
                    'lugar_expedicion'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Lugar de expedición C.C...']],
                    
                ]
                ],

                [
                'attributes'=>[
                    'id_genero' => [
                                   'type'=>Form::INPUT_WIDGET, 
                                   'widgetClass'=>'kartik\select2\Select2',
                                       'options' => [
                                                    'data' => ArrayHelper::map(Genero::find()->orderBy('genero')->asArray()->all(), 'id_genero', 'genero'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione genero')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],
                    ],

                    'lugar_nac'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Lugar de nacimiento']],
                    

                    'fecha_nac'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],


                    ],
                    
                    'id_estado_civil' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Estadocivil::find()->orderBy('estado_civil')->asArray()->all(), 'id_estado_civil', 'estado_civil'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione estado civil')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],
                    
                ]
                ],


                [
                'attributes'=>[
                    
                    'id_tipo_funcionario' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Tipofuncionario::find()->orderBy('tipo_funcionario')->asArray()->all(), 'id_tipo_funcionario', 'tipo_funcionario'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione estado civil')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],
                                ],


                     'id_rh' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Rh::find()->orderBy('rh')->asArray()->all(), 'id_rh', 'rh'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione tipo de sangre')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                                ],
                ]
                ],

               

                [
                'attributes'=>[
                    'direccion'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Dirección de residencia...']],
                    
                    
                ]
                ],


                [
                'attributes'=>[
                    
                    'telefono'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Teléfono de residencia...']],
                    'tel_movil'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Teléfono movil...']],
                    'email'=>['type'=>Form::INPUT_TEXT,  
                        'options'=>['placeholder'=>'Correo electrónico...']
                        

                        ],
                ]
                ],

                [

                'contentBefore'=>'<legend class="text-success"><small>Datos de bancos</small></legend>',

                'attributes'=>[


                    
                    'id_banco' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Banco::find()->orderBy('banco')->asArray()->all(), 'id_banco', 'banco'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione banco')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                        ],

                       'numero_cuenta'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de cuenta...']], 

                ]
                ],



            ],
        
         
            
    ]); ?>

    <?php 

        if(!$model->isNewRecord)
            echo $form->field($model, 'estado')->widget(CheckboxX::classname(), [
            'initInputType' => CheckboxX::INPUT_CHECKBOX,
            'attribute' => 'status',
            //'labelSettings' => ['label' => 'Estado del funcionario', 'options'=>['class'=>'text-info']],
            'pluginOptions' => [
                'threeState' => true,
                'size' => 'lg'

            ],
            'autoLabel' => false
                ])->label(false);
   
    ?>


    

    
    
    </label>
    </div
    

    </div>
     </div>
      </div>
       </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
