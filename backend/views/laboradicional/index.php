<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\Funcionario;
use backend\models\Modulo;
use backend\models\Facultad;
use backend\models\Jornada;
use backend\models\Programa;
use backend\models\Tipotitulo;
use backend\models\Periodoacademico;
use backend\models\Semestre;
use yii\bootstrap\Collapse;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LaboradicionalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Labor adicional');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboradicional-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <?php echo Collapse::widget([
    'items' => [
        [
            'label' => 'Buscar',
            'class' => 'success',
                'content' => $this->render('_search', ['model' => $searchModel]) ,
            ],
        ]
    ]);
    ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>'), ['create'], ['class' => 'btn btn-success'])
                

                 . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')])


         ?>
    </p>
    
     <?= GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'showPageSummary'=>true,
    'pjax'=>true,
    'striped'=>true,
    'condensed'=>true,
    'responsive'=>true,
    'responsiveWrap'=>true,
    'resizableColumns'=>true,
    'hover'=>true,

    'toolbar' =>  [
        ['content'=>
        
         
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')
                ]),

        'footer'=>false
        ],

        '{export}',
        '{toggleData}'
    ],


        'panel' => [
        'heading'=>'<h4 class="panel-title"><i class="glyphicon glyphicon-briefcase"> </i> Labor Adicional (Diplomados, Cursos, Seminarios y Especializaciones)</h4>',
        'type'=>'primary',
        // 'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', '#', [
        //     'id' => 'activity-index-link',
        //     'class' => 'btn btn-success',  
        //     'data-toggle' => 'modal',
        //     'data-target' => '#modal',
        //     'data-url' => Url::to(['create']),
        //     'data-pjax' => '0',
        // ]),

        // 'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning']),
        // 'footer'=>false
    ],
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],


         'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],


            //'id_laboradicional',

            
             [
                'attribute' => 'id_periodo_academico',
                'value'=> 'periodoAcademico.periodo',
                'filter'=>Periodoacademico::get_pacademico(), 
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                //'group'=>'true',
              
            ],      


            [
                'attribute' => 'id_funcionario',
                'label'=>'Identificación',
                'filter'=>Funcionario::get_funcionario(), 
                'value'=> 'funcionario.identificacion',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'right',
                'group'=>true,
               
            ],

            [
                'attribute' => 'id_funcionario',
                'label'=> 'Docente',
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
                'width'=>'120px',
                'vAlign'=>'middle',
                'group'=>true,
               
               
            ],

            

            [
                'attribute' => 'id_tipotitulo',
                'filter'=>Tipotitulo::get_tipotitulo(), 
                'headerOptions' => ['style'=>'text-align:center'],
                'value'=> 'tipotitulo.tipotitulo',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                //'group'=>true,
               
            ],

             [
               'attribute' => 'fecha_inicio',
               'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                // 'group'=>true,
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_inicio',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha_inicio',
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
                //'group'=>true,
                'hAlign'=>'center',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_fin',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha_fin',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
            ],



            [
                'attribute' => 'id_facultad',
                'value'=> 'facultad.facultad',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Facultad::get_facultad(), 
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
              
            ],

            [
                'attribute' => 'id_programa',
                'value'=> 'programa.programa',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Programa::get_programa(),      
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
              
            ],

            [
                'attribute' => 'id_modulo',
                'value'=> 'modulo.modulo',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Modulo::get_modulo(), 
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
              
            ],

            [
                'attribute' => 'id_semestre',
                'value'=> 'semestre.semestre',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Semestre::get_semestre(), 
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
              
            ],
            
            [
                'attribute' => 'horas_sem',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
              
            ],

            [
                'attribute' => 'vr_hora',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>['decimal', 0],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
              
            ],      
            


             [
                'attribute' => 'vr_semestre',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>['decimal', 0],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                'pageSummary'=>true,
                'pageSummaryOptions'=>['class'=>'text-right text-danger'],
                'mergeHeader'=>true,
              
            ],      


            ['class' => 'kartik\grid\ActionColumn',
                          'header' => 'Acciones',
                          'template' => '{update}{delete}',
                          
            ],
        ],
    ]); ?>
</div>
