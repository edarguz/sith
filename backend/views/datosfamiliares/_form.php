<?php

use yii\helpers\Html;
use kartik\widgets\DatePicker;
use kartik\widgets\ActiveForm;
use backend\models\Datosfamiliares;
use kartik\builder\FormGrid;
use kartik\builder\Form;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use backend\models\Funcionario;
use backend\models\Genero;
//use kartik\datecontrol\Module;
//use kartik\datecontrol\DateControl;
//use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

$Genero=Genero::find()->all();
$listData=ArrayHelper::map($Genero,'id_genero','genero');



/* @var $this yii\web\View */
/* @var $model backend\models\Datosfamiliares */
/* @var $form yii\widgets\ActiveForm */

$js = '

jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    jQuery(".dynamicform_wrapper .panel-title-hijo").each(function(index) {

        jQuery(this).html("hijo: " + (index + 1))

    });

});


jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {

    jQuery(".dynamicform_wrapper .panel-title-hijo").each(function(index) {

        jQuery(this).html("hijo: " + (index + 1))

    });

});

';


$this->registerJs($js);

?>





<div class="datosfamiliares-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>


    <div class="form">

       <div class="row">

            <div class="col-sm-6">

                 <?= $form->field($model, 'id_funcionario', ['labelOptions'=>['style'=>'color:green']] )->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Funcionario::find()->all(), 'id_funcionario', 'fullName'),
                    'language' => 'es',
                    'pluginOptions' => ['highlight'=>true],
                    'options' => ['placeholder' => 'Seleccione funcionario...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
               
                ?>

            </div>


                       
        </div>


   

    <div class="form">

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="glyphicon glyphicon-leaf"> </i> Datos Familiares Funcionarios </h4></div>

    <div class="panel-body">

    <?php DynamicFormWidget::begin([

        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsDatosfamiliares[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'nombres',
            'apellidos',
            'genero',
            'fecha_nacimiento',
                   
        ],

    ]); ?>


    <div class="panel panel-default">

        <div class="panel-heading">

            <i class="fa fa-users" aria-hidden="true"></i> Datos Familiares
            <button type="button" class="pull-right add-item btn btn-success btn-primary"><i class="fa fa-plus"></i> </button>

            <div class="clearfix"></div>

        </div>

        <div class="panel-body container-items"><!-- widgetContainer -->

            <?php foreach ($modelsDatosfamiliares as $index => $modelsDatosfamiliares): ?>

                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-hijo">hijo: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-primary"><i class="fa fa-trash-o fa-lg"></i></button>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">

                        <?php
                            // necessary for update action.
                            if (!$model->isNewRecord) {
                                echo Html::activeHiddenInput($modelsDatosfamiliares, "[{$index}]id");
                            }

                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelsDatosfamiliares, "[{$index}]nombres")->textInput(['maxlength' => true]) ?>
                               
                            </div>

                            <div class="col-sm-6">

                                <?= $form->field($modelsDatosfamiliares, "[{$index}]apellidos")->textInput(['maxlength' => true]) ?>

                            </div>
                           

                           
                        </div><!-- end:row -->


                        <div class="row">

                            <div class="col-sm-6">

                                 <?= $form->field($modelsDatosfamiliares, "[{$index}]genero")->dropDownList($listData,
                                    ['prompt'=>'Seleccione género del niño...']);
                                 ?>


                               

                            </div>

                             <div class="col-sm-6">


                             <?= $form->field($modelsDatosfamiliares,"[{$index}]fecha_nacimiento")->widget(DatePicker::classname(), [
                                'model' => $modelsDatosfamiliares,
                                'attribute' => 'fecha_nacimiento',
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

                        </div><!-- end:row -->

             <?php endforeach; ?>

        </div>
        </div>
        </div>
    </div>

    <?php DynamicFormWidget::end(); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>


</div>

<script type="text/javascript">
    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});
 
$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});
 
$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});
 
$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});
 
$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});
</script>

