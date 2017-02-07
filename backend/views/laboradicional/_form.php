<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Funcionario;
use backend\models\Programa;
use backend\models\Modulo;
use backend\models\Periodoacademico;
use backend\models\Tipotitulo;
use backend\models\Facultad;
use backend\models\Semestre;
use kartik\widgets\DepDrop;

/* @var $this yii\web\View */
/* @var $model backend\models\Laboradicional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laboradicional-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); ?>

   

    <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-briefcase"> </i> Labor Adicional (Diplomados, Cursos, Seminarios y Especializaciones) </h4></div>

     <div class="panel-body">


    <?= $form->field($model, 'id_funcionario', ['labelOptions'=>['style'=>'color:blue']])->widget(Select2::classname(), [
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


                 'attributes'=> [ 
                    
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

                     

                   

                 ],

                ],
           

                [

                'contentBefore'=>'<legend class="text-info"><small>Labor Adicional docentes</small></legend>',

                'attributes'=> [ 
                    
                    'id_tipotitulo' => [
                                   'type'=>Form::INPUT_WIDGET, 
                                   'widgetClass'=>'kartik\select2\Select2',
                                       'options' => [
                                                    'data' => ArrayHelper::map(Tipotitulo::find()->orderBy('tipotitulo')->asArray()->all(), 'id_tipotitulo', 'tipotitulo'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione tipotitulo')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],


                    ],


                     'id_facultad' => [
                                   'type'=>Form::INPUT_WIDGET, 
                                   'widgetClass'=>'kartik\select2\Select2',
                                       'options' => [
                                                    'data' => ArrayHelper::map(Facultad::find()->orderBy('facultad')->asArray()->all(), 'id_facultad', 'facultad'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione facultad')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],


                    ],

                     'id_programa' => [
                                   'type'=>Form::INPUT_WIDGET, 
                                   'widgetClass'=>'kartik\select2\Select2',
                                       'options' => [
                                                    'data' => ArrayHelper::map(Programa::find()->orderBy('programa')->asArray()->all(), 'id_programa', 'programa'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione programa')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],


                    ],

                     'id_semestre' => [
                                   'type'=>Form::INPUT_WIDGET, 
                                   'widgetClass'=>'kartik\select2\Select2',
                                       'options' => [
                                                    'data' => ArrayHelper::map(Semestre::find()->orderBy('semestre')->asArray()->all(), 'id_semestre', 'semestre'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione semestre')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],


                    ],

                ],


                ],


                ///////////////////////////////

                
                [
                
                
                'attributes'=> [ 

                    'id_periodo_academico' => [
                                   'type'=>Form::INPUT_WIDGET, 
                                   'widgetClass'=>'kartik\select2\Select2',
                                       'options' => [
                                                    'data' => ArrayHelper::map(Periodoacademico::find()->orderBy('periodo')->asArray()->all(), 'id_periodo_academico', 'periodo'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione periodo')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],


                    ],
                    
                    'id_modulo' => [
                                   'type'=>Form::INPUT_WIDGET, 
                                   'widgetClass'=>'kartik\select2\Select2',
                                       'options' => [
                                                    'data' => ArrayHelper::map(Modulo::find()->orderBy('modulo')->asArray()->all(), 'id_modulo', 'modulo'),
                                                    'options' => ['placeholder' => Yii::t('app','Seleccione modulo')],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ],


                    ],

                   'horas_sem'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Horas semestre...']], 

                   




                ],
                


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
