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
/* @var $searchModel backend\models\search\LabordocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Labor docente');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="labordocente-index">

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

    'rowOptions' => function($model) {

        if ($model->id_tipotitulo == 7) 
        {
            return ['class'=>'info'];
        }
        if ($model->id_tipotitulo == 5) 
        {
            return ['class'=>'success'];
        }

    },


    'toolbar' =>  [
        ['content'=>
        
         
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')
                ]),

        'footer'=>false
        ],

        '{export}',
        '{toggleData}'
    ],

      //'panel'=>['type'=>'primary', 'heading'=>'Contratos'],
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Datos Labor docente</h3>',
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

            [
                'attribute' => 'id_periodo_academico',
                'value'=> 'periodoAcademico.periodo',
                'filter'=>Periodoacademico::get_pacademico(), 
                'headerOptions' => ['style'=>'text-align:center'],
                //'format'=>'raw',
                'format' => 'html',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                //'group'=>'true',
              
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
                'group'=>true,
               
            ],

           

           [
                'header' => 'Número Semanas',
                'headerOptions' => ['style'=>'text-align:center'],
                'value' => function($data) {
                   return $data->getsemanas();
                }, 
                
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                //'group'=>true,
                'mergeHeader'=>true,
          
            ],

           
            [

                'attribute' => 'id_tipotitulo',
                'label'=> 'Valor hora',
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->tipotitulo->vr_hora;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(Tipotitulo::find()->orderBy('vr_hora')->asArray()->all(), 'id_tipotitulo', 'vr_hora'), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'headerOptions' => ['style'=>'text-align:center'],
                'filterInputOptions'=>['placeholder'=>'Any supplier'],
                'group'=>true, 
                'subGroupOf'=>1,
                // enable grouping
                'width'=>'100px',
                'format'=>['decimal', 0],
                'vAlign'=>'middle',
                'hAlign'=>'center',
                'pageSummary'=>'Total General semestre',
                'pageSummaryOptions'=>['class'=>'text-right text-primary'],
                'mergeHeader'=>true,    
            ],   


            [
                'attribute' => 'valor_semestre',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>['currency','$',0],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                'pageSummary'=>true,
                'pageSummaryOptions'=>['class'=>'text-right text-success'],
                'mergeHeader'=>true,
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
                          'template' => '{view}{update}{delete}',
                          
            ],
        ],
    ]); ?>
</div>
