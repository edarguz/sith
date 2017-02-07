<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Funcionario;
use backend\models\Tipotitulo;
use backend\models\Fondosalud;
use backend\models\Fondopensiones;
use backend\models\Arl;
use backend\models\Area;
use backend\models\Cargo;
use kartik\widgets\DepDrop;
use kartik\widgets\DatePicker;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;


/* @var $this yii\web\View */
/* @var $model backend\models\Laborcontratista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laborcontratista-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); ?>

    <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"> </i> Contratistas </h4></div>

    <div class="panel-body">


    <?= $form->field($model, 'id_funcionario')->widget(Select2::classname(), [
       'data' => ArrayHelper::map(Funcionario::find()->where(['estado'=>1])->orderBy('nombres')->all(), 'id_funcionario', 'fullName'),
        'language' => 'es',
        'options' => ['placeholder' => 'Seleccione funcionario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
   
    ?>


    <?=

    FormGrid::widget(
    [
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
       
       'rows'=>[
           

                [
                'contentBefore'=>'<legend class="text-info"><small>Contratistas Unimayor</small></legend>',
                
                'attributes'=> [ 

                    'id_tipotitulo' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Tipotitulo::find()->orderBy('tipotitulo')->asArray()->all(), 'id_tipotitulo', 'tipotitulo'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione tipo título')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],

                    'num_contrato'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número del contrato...']],
                    'valor_contrato'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Valor del contrato...']],


                     'cdp'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número del CDP del contrato...']],             

                   
                    ]
                ],



                [
                'attributes'=>[


                    'fecha_cdp'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                        'options' => [ 'pluginOptions' => ['format' => 'yyyy-mm-dd','todayHighlight' => true, 'autoclose'=>true,],],


                     ],

                    'fecha_suscripcion'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],


                    ],
                                       
                   'fecha_inicio'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],


                    ],

                    
                    'fecha_fin'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],


                    ],
                    
                ]
                ],


                [
                'attributes'=>[
                   'fecha_registro'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\widgets\DatePicker', 
                      'options' => [ 'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true, 
                            'autoclose'=>true,],],
                    ],

                    'id_cargo' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Cargo::find()->orderBy('cargo')->asArray()->all(), 'id_cargo', 'cargo'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione cargo')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],

                    'supervisor'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Supervisor...']],
                    'id_area' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Area::find()->orderBy('area')->asArray()->all(), 'id_area', 'area'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione area')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],
                    
                    
                ]
                ],  


                [
                'attributes'=>[
                    
                   'id_fondosalud' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Fondosalud::find()->orderBy('fondo_salud')->asArray()->all(), 'id_fondo_salud', 'fondo_salud'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione fondo de salud')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],

                    'id_fondopensiones' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Fondopensiones::find()->orderBy('fondo_pensiones')->asArray()->all(), 'id_fondo_pensiones', 'fondo_pensiones'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione fondo de pensión')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],


                    'id_arl' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ArrayHelper::map(Arl::find()->orderBy('arl')->asArray()->all(), 'id_arl', 'arl'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione arl')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],
                    
                    
                 ]
                ],      

               
                [
                'attributes'=>[
                    
                    'forma_pago' => [
                                    'type'=>Form::INPUT_WIDGET, 
                                    'widgetClass'=>'kartik\select2\Select2',
                                    'options' => [
                                                    'data' => ["Consignación" => "Consignación", "Cheque" => "Cheque",],
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione forma de pago')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],

                    ],

                    'num_cuotas'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Número de cuotas  ...']],

                    
                    
                 ]
                ],    

                
                [
                'attributes'=>[
                    'objeto'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Objeto del contrato...']],
                    
                    
                ]
                ],    


                [
                'attributes'=>[
                    'actividades'=>['type'=>Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Actividades del contrato...']],

                    
                    
                 ]
                ],    

 

            ],
        
         
            
    ]); ?>


     </div>
     </div>
      </div>
       </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="glyphicon glyphicon-floppy-disk"></i> Guardar') : Yii::t('app', '<i class="glyphicon glyphicon-refresh"></i> Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
