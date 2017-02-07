<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\widgets\DatePicker;
use backend\models\Funcionario;
use backend\models\Programa;
use backend\models\Modulo;
use backend\models\Periodoacademico;
use backend\models\Tipotitulo;
use backend\models\Jornada;
use backend\models\Facultad;
use backend\models\Semestre;
use kartik\widgets\DepDrop;

//use dosamigos\datetimepicker\DateTimePicker;
use kartik\widgets\ActiveForm;
use kartik\builder\FormGrid;
use kartik\builder\Form;
use wbraganca\dynamicform\DynamicFormWidget;

$Programa=Programa::find()->all();
$listDataprograma=ArrayHelper::map($Programa,'id_programa','programa');
$Modulo=Modulo::find()->all();
$listDatamodulo=ArrayHelper::map($Modulo,'id_modulo','modulo');
$Semestre=Semestre::find()->all();
$listDatasemestre=ArrayHelper::map($Semestre,'id_semestre','semestre');
$Jornada=Jornada::find()->all();
$listDatajornada=ArrayHelper::map($Jornada,'id_jornada','jornada');



$js = '

jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    jQuery(".dynamicform_wrapper .panel-title-labor").each(function(index) {

        jQuery(this).html("labor: " + (index + 1))

    });

});


jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {

    jQuery(".dynamicform_wrapper .panel-title-labor").each(function(index) {

        jQuery(this).html("labor: " + (index + 1))

    });

});

';



$this->registerJs($js);

?>

<div class="labordocente-form">




  <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>


  <div class="form">

       <div class="row">

            <div class="col-sm-6">

                 <?= $form->field($model, 'id_funcionario', ['labelOptions'=>['style'=>'color:green']] )->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Funcionario::find()->where(['estado'=>1])->orderBy('nombres')->all(), 'id_funcionario', 'fullName'),
                    'language' => 'es',
                    'pluginOptions' => ['highlight'=>true],
                    'options' => ['placeholder' => 'Seleccione funcionario...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
               
                ?>

            </div>

            <div class="col-sm-6">

                 <?= $form->field($model, 'id_tipotitulo', ['labelOptions'=>['style'=>'color:green']] )->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Tipotitulo::find()->asArray()->all(), 'id_tipotitulo', 'tipotitulo'),
                    'language' => 'es',
                    'pluginOptions' => ['highlight'=>true],
                    'options' => ['placeholder' => 'Seleccione título...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
               
                ?>

            </div>


            <div class="col-sm-6">

                 <?= $form->field($model, 'id_facultad', ['labelOptions'=>['style'=>'color:green']] )->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Facultad::find()->orderBy('facultad')->asArray()->all(), 'id_facultad', 'facultad'),
                    'language' => 'es',
                    'pluginOptions' => ['highlight'=>true],
                    'options' => ['placeholder' => 'Seleccione facultad...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
               
                ?>

            </div>

             <div class="col-sm-6">

                 <?= $form->field($model, 'id_periodo_academico', ['labelOptions'=>['style'=>'color:green']] )->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Periodoacademico::find()->orderBy('periodo')->asArray()->all(), 'id_periodo_academico', 'periodo'),
                    'language' => 'es',
                    'pluginOptions' => ['highlight'=>true],
                    'options' => ['placeholder' => 'Seleccione periodo académico...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
               
                ?>

            </div>


                       
        </div>


  <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-blackboard"></i> Labor Docente </h4></div>

    <div class="panel-body"> 
   
    <?php DynamicFormWidget::begin([

        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]

        'widgetBody' => '.container-items', // required: css class selector

        'widgetItem' => '.item', // required: css class

        'limit' => 6, // the maximum times, an element can be cloned (default 999)

        'min' => 0, // 0 or 1 (default 1)

        'insertButton' => '.add-item', // css class

        'deleteButton' => '.remove-item', // css class

        'model' => $modelsLabordocente[0],

        'formId' => 'dynamic-form',

        'formFields' => [

            'fecha_inicio',
            'fecha_fin',
            'id_programa',
            'id_modulo',
            'id_semestre',
            'id_jornada',
            'horas_semanales',
            'horas_trabajo_grado',
            'horas_examenes_finales'
            //'horas_reunion_general',
            //'horas_reunion_facultad',
            //'horas_jurado_grado',
            //'observaciones',
                   
        ],

    ]); ?>
  

    <div class="panel panel-default">

        <div class="panel-heading">

            <i class="fa fa-briefcase "></i> Labordocente
            <button type="button" class="pull-right add-item btn btn-success btn-primary"><i class="fa fa-plus"></i> Agregar labor</button>

            <div class="clearfix"></div>

        </div>

        <div class="panel-body container-items"><!-- widgetContainer -->

            <?php foreach ($modelsLabordocente as $index => $modelsLabordocente): ?>

                <div class="item panel panel-primary"><!-- widgetBody -->

                    <div class="panel-heading">

                        <span class="panel-title-labor">Labor: <?= ($index + 1) ?></span>

                        <button type="button" class="pull-right remove-item btn btn-danger btn-primary"><i class="fa fa-trash-o fa-lg"></i></button>

                        <div class="clearfix"></div>

                    </div>

                    <div class="panel-body">

                        <?php

                            // necessary for update action.

                            if (!$model->isNewRecord) {

                                echo Html::activeHiddenInput($modelsLabordocente, "[{$index}]id");

                            }

                        ?>

                        <div class="row">


                            <div class="col-sm-4">
                                <?= $form->field($modelsLabordocente,"[{$index}]fecha_inicio")->widget(DatePicker::classname(), [
                                'model' => $modelsLabordocente,
                                'attribute' => 'fecha_inicio',
                                'options'=>['placeholder'=>'AAAA/MM/DD','style'=>'width:250px;'],
                                'language' => 'es',
                                'size' => 'ms',
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'dateFormat' => 'yyyy-mm-dd',
                                    'startView'=>'year'
                                ]
                     
                                ]); ?>

                               
                            </div>


                             <div class="col-sm-4">
                                <?= $form->field($modelsLabordocente,"[{$index}]fecha_fin")->widget(DatePicker::classname(), [
                                'model' => $modelsLabordocente,
                                'attribute' => 'fecha_fin',
                                'options'=>['placeholder'=>'AAAA/MM/DD','style'=>'width:250px;'],
                                'language' => 'es',
                                'pluginOptions' => [
                                    'dateFormat' => 'yyyy-mm-dd',
                                    'autoclose'=>true,
                                 ],
                                ]); ?>
                            </div>



                            <div class="col-sm-4">
                                
                                <?= $form->field($modelsLabordocente, "[{$index}]id_programa")->dropDownList($listDataprograma,
                                    ['prompt'=>'Seleccione el tipo de programa...']);
                                 ?>

                            </div>
                                                      

                           
                        </div><!-- end:row -->


                        <div class="row">

                            <div class="col-sm-4">
                                
                                <?= $form->field($modelsLabordocente, "[{$index}]id_modulo")->dropDownList($listDatamodulo,
                                    ['prompt'=>'Seleccione componente de módulo...']);
                                 ?>

                            </div>

                             <div class="col-sm-4">
                                
                                <?= $form->field($modelsLabordocente, "[{$index}]id_semestre")->dropDownList($listDatasemestre,
                                    ['prompt'=>'Seleccione semestre...']);
                                 ?>


                            </div>

                            <div class="col-sm-4">
                                
                                <?= $form->field($modelsLabordocente, "[{$index}]id_jornada")->dropDownList($listDatajornada,
                                    ['prompt'=>'Seleccione grupo...']);
                                 ?>
                             </div>

                        </div><!-- end:row -->

                       
                         <div class="row">

                             <div class="col-sm-4">
                                <?= $form->field($modelsLabordocente, "[{$index}]horas_semanales")->textInput(['maxlength' => true]) ?>
                             </div>

                             <div class="col-sm-4">
                                
                               <?= $form->field($modelsLabordocente, "[{$index}]horas_trabajo_grado")->textInput(['maxlength' => true]) ?>

                            </div>

                             <div class="col-sm-4">
                                <?= $form->field($modelsLabordocente, "[{$index}]horas_examenes_finales")->textInput(['maxlength' => true]) ?>
                             </div>



                        </div><!-- end:row -->

                        

                        <div class="row">

                            <div class="col-sm-4">
                                
                               <?= $form->field($modelsLabordocente, "[{$index}]horas_reunion_general")->textInput(['maxlength' => true]) ?>

                            </div>

                             <div class="col-sm-4">
                                <?= $form->field($modelsLabordocente, "[{$index}]horas_reunion_facultad")->textInput(['maxlength' => true]) ?>
                             </div>

                              <div class="col-sm-4">
                                
                               <?= $form->field($modelsLabordocente, "[{$index}]horas_jurado_grado")->textInput(['maxlength' => true]) ?>

                            </div>

                        </div><!-- end:row -->

                        <div class="row">

                             <div class="col-sm-12">
                                <?= $form->field($modelsLabordocente, "[{$index}]observaciones")->textArea(['maxlength' => true]) ?>
                             </div>

                        </div><!-- end:row -->




             <?php endforeach; ?>

   
    

     </div>
     </div>
      </div>
       </div>

     <?php DynamicFormWidget::end(); ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="glyphicon glyphicon-floppy-disk"></i> Guardar') : Yii::t('app', '<i class="glyphicon glyphicon-refresh"></i> Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
