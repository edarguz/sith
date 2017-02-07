<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use backend\models\Tiponovedad;
use backend\models\Funcionario;
use kartik\select2\Select2;
use yii\bootstrap\Collapse;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NovedadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Novedades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novedad-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
   <?php echo Collapse::widget([
    'items' => [
        [
            'label' => 'Buscar',
            'options' => ['class' => 'btn btn-warning'],
            'content' => $this->render('_search', ['model' => $searchModel]) ,
            ],

        ]
    ]);
    ?>

        

    <?php Pjax::begin(['id' => 'Novedad-grid']) ?>

    <?= GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    //'showPageSummary'=>true,
    'pjax'=>true,
    'striped'=>true,
    'condensed'=>true,
    'responsive'=>true,
    'responsiveWrap'=>true,
    'resizableColumns'=>true,
    'hover'=>true,
    
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Novedades</h3>',
        'type'=>'primary',
        'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',  
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0', 
        ]) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')]),
        'footer'=>false

        
    ],
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    // 'pjax'=>true, // pjax is set to always true for this demo
    // //'htmlOptions'=>array('style'=>'word-wrap:break-word; width:850px;'),
    //     'pjaxSettings'=>[
    //     'neverTimeout'=>true,
    //     // 'beforeGrid'=>'Aspectos a evaluar',
    //     // 'afterGrid'=>'My fancy content after.',
    // ],

        'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],

            [
                'attribute' => 'id_tipo_novedad',
                'filter'=>Tiponovedad::get_tiponovedad(), 
                'value'=> 'tipoNovedad.tipo_novedad',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
              
            ],


            [
                'attribute' => 'id_funcionario',
                'label'=> 'identificación',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Funcionario::get_funcionario(), 
                'value'=> 'funcionario.identificacion',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
               
            ],

            [
                'attribute' => 'id_funcionario',
                'label'=> 'Funcionario',
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->funcionario->fullName;
                },
                
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>Funcionario::get_funcionarioName(), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Seleccione funcionario'],
                'headerOptions' => ['style'=>'text-align:center'],
                //'value'=>'funcionario.fullName',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
               
            ],

           

            // [
            //     'attribute' => 'id_funcionario',
            //     'header'=> 'Apellidos',
            //     'filter'=>Funcionario::get_funcionarioApe(), 
            //     'value'=> 'funcionario.apellidos',
            //     'format'=>'raw',
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
               
            // ],


            [
                'attribute' => 'fecha_inicio',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'options' => ['style' => 'width: 20%;'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_inicio',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha2',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
               
            ],

            [
                'attribute' => 'fecha_fin',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'options' => ['style' => 'width: 20%;'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_fin',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha2',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
            ],

            [
                'attribute' => 'observaciones',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'mergeHeader'=>true,
                
            ],  
           
           
           

           ['class' => 'kartik\grid\ActionColumn',
                          'header' => 'Acciones',
                          'template' => '{update}{delete}',
                            'buttons'=>[
                                 'update' => function ($url, $model, $key) {
                                    return Html::a('<span class="glyphicon glyphicon-edit"></span>', '#', [
                                        'id' => 'activity-index-link',
                                        'title' => Yii::t('app', 'Actualizar'),
                                        'data-toggle' => 'modal',
                                        'data-target' => '#modal',
                                        'data-url' => Url::to(['update', 'id' => $model->id_novedad]),
                                        'data-pjax' => '0',
                                    ]);
                                },    

                          ]                            
            ],







        ],
    ]); ?>

    <?php Pjax::end() ?>

    <?php
        $this->registerJs(
            "$(document).on('click', '#activity-index-link', (function() {
                $.get(
                    $(this).data('url'),
                    function (data) {
                        $('.modal-body').html(data);
                        $('#modal').modal();
                    }
                );
            }));"
        ); ?>
         
        <?php
        Modal::begin([
            'id' => 'modal',
            'header' => '<h4 class="modal-title">Complete Información de la Novedad</h4>',
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">Cerrar</a>',
            'size' => Modal::SIZE_DEFAULT,
        ]);
         
        echo "<div class='well'></div>";
         
        Modal::end();
        ?>


</div>
