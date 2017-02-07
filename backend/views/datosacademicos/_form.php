<?php

use yii\helpers\Html;
use backend\models\Funcionario;
use backend\models\Tipotitulo;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

$Tipotitulo=Tipotitulo::find()->all();
$listData=ArrayHelper::map($Tipotitulo,'id_tipotitulo','tipotitulo');



$js = '

jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    jQuery(".dynamicform_wrapper .panel-title-estudio").each(function(index) {

        jQuery(this).html("estudio: " + (index + 1))

    });

});


jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {

    jQuery(".dynamicform_wrapper .panel-title-estudio").each(function(index) {

        jQuery(this).html("estudio: " + (index + 1))

    });

});

';


$this->registerJs($js);

?>



<div class="datosacademicos-form">

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

    
   

    <div class="panel panel-primary">

    <div class="panel-heading"><h4><i class="fa fa-university" aria-hidden="true"></i> Datos Académicos funcionarios </h4></div>

    <div class="panel-body">

    <?php DynamicFormWidget::begin([

        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]

        'widgetBody' => '.container-items', // required: css class selector

        'widgetItem' => '.item', // required: css class

        'limit' => 4, // the maximum times, an element can be cloned (default 999)

        'min' => 0, // 0 or 1 (default 1)

        'insertButton' => '.add-item', // css class

        'deleteButton' => '.remove-item', // css class

        'model' => $modelsDatosacademicos[0],

        'formId' => 'dynamic-form',

        'formFields' => [

            'id_titulo',
            'titulo',
            'institucion',
            //'fecha_titulo',

                    
        ],

    ]); ?>

        <div class="panel panel-default">

        <div class="panel-heading">

            <i class="fa fa-book" aria-hidden="true"></i> Datos Académicos

            <button type="button" class="pull-right add-item btn btn-success btn-primary"><i class="fa fa-plus"></i> </button>

            <div class="clearfix"></div>

        </div>

        <div class="panel-body container-items"><!-- widgetContainer -->

            <?php foreach ($modelsDatosacademicos as $index => $modelsDatosacademicos): ?>

                <div class="item panel panel-default"><!-- widgetBody -->

                    <div class="panel-heading">

                        <span class="panel-title-estudio">Estudio: <?= ($index + 1) ?></span>

                        <button type="button" class="pull-right remove-item btn btn-danger btn-primary"><i class="fa fa-trash-o fa-lg"></i></button>


                        <div class="clearfix"></div>

                    </div>

                    <div class="panel-body">

                        <?php

                            // necessary for update action.

                            if (!$model->isNewRecord) {

                                echo Html::activeHiddenInput($modelsDatosacademicos, "[{$index}]id");

                            }

                        ?>

                        <div class="row">


                            <div class="col-sm-6">

                                <?= $form->field($modelsDatosacademicos, "[{$index}]id_titulo")->dropDownList($listData,
                                    ['prompt'=>'Seleccione el tipo de título...']);
                                 ?>

                                
                            </div>

                            <div class="col-sm-6">

                                <?= $form->field($modelsDatosacademicos, "[{$index}]titulo")->textInput(['maxlength' => true]) ?>

                            </div>
                           

                           
                        </div><!-- end:row -->


                        <div class="row">

                            <div class="col-sm-6">

                                <?= $form->field($modelsDatosacademicos, "[{$index}]institucion")->textInput(['maxlength' => true]) ?>

                            </div>

                             <div class="col-sm-6">


                               
                                 <?= $form->field($modelsDatosacademicos,"[{$index}]fecha_titulo")->widget(DatePicker::classname(), [
                                    'model' => $modelsDatosacademicos,
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

    <?php DynamicFormWidget::end(); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

    

 
   