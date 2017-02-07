<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use backend\models\Area;
use backend\models\Cargo;
use yii\helpers\ArrayHelper;
use backend\models\Funcionario;
use backend\models\Tipotitulo;
use backend\models\Fondopensiones;
use backend\models\Arl;
use backend\models\Fondosalud;
use yii\bootstrap\Collapse;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LaborcontratistaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Labor contratista');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laborcontratista-index">

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


    <div class="row">
    <div class="col-xs-12 table-responsive">

   
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
    'persistResize'=>false,

   
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

        'export'=>[
        'fontAwesome'=>true
    ],

      //'panel'=>['type'=>'primary', 'heading'=>'Contratos'],
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Datos Labor contratista</h3>',
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
   // 'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],


       'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],

            [
                'attribute' => 'num_contrato',
                //'headerOptions' => ['style'=>'text-align:left'],
                'format' => 'html',
                'width'=>'300px',
                'vAlign'=>'middle',
                //'hAlign'=>'center',
            
            ],

         
            //'id_contratista',
            [
                'attribute' => 'id_funcionario',
                'label'=>'Identificación',
                //'filter'=>Funcionario::get_funcionario(),
                'filterType'=>GridView::FILTER_SELECT2, 
                'value'=> 'funcionario.identificacion',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'right',
                'group'=>true,
               
            ],

            [
               
                'attribute' => 'id_funcionario',
                'label'=> 'Funcionario',
                'headerOptions' => ['style'=>'text-align:center'],
                'value'=>'funcionario.fullName',
                //'filter'=>Funcionario::get_funcionarioApe(), 
                'filterType'=>GridView::FILTER_SELECT2,
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                //'hAlign'=>'center',

               

            ],

            [
                'attribute' => 'id_tipotitulo',
                'label' => 'Tipo título',
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
                'attribute' => 'id_fondopensiones',
                'headerOptions' => ['style'=>'text-align:center'],
                'value'=> 'fondopensiones.fondo_pensiones',
                'filter'=>Fondopensiones::get_fpensiones(), 
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',

            ],

            [
                'attribute' => 'id_arl',
                'headerOptions' => ['style'=>'text-align:center'],
                'value'=> 'arl.arl',
                'filter'=>Arl::get_adminriesgos(), 
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
            ],

           
            [
                
                'attribute' => 'id_fondosalud',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Fondosalud::get_fsalud(),
                'value'=> 'fondosalud.fondo_salud',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',

            ],


            [
                'attribute' => 'valor_contrato',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>['decimal', 0],
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               
               
            ],


            [
                'attribute' => 'forma_pago',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               
               
            ],

            [
                'attribute' => 'num_cuotas',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>['decimal', 0],
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               
               
            ],


            [
                'attribute' => 'cdp',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               
               
            ],

            [
                'attribute' => 'fecha_cdp',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                 'hAlign'=>'center',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_cdp',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha_cdp',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
            ],


            [
                'attribute' => 'fecha_suscripcion',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                 'hAlign'=>'center',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_suscripcion',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha_suscripcion',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
            ],


                      
            [
               'attribute' => 'fecha_inicio',
               'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                 'hAlign'=>'center',
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
                'attribute' => 'fecha_registro',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                 'hAlign'=>'center',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_registro',
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => [
                        'id' => 'fecha_registro',
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'startView' => 'year',
                    ]
                ])
            ],
           

            
            [
                'attribute' => 'objeto',
                //'headerOptions' => ['style'=>'text-align:left'],
                'format' => 'raw',
                'width'=>'310px',
                'vAlign'=>'left',
                //'headerOptions'=>['class'=>'kv-sticky-column'],
                //'contentOptions'=>['class'=>'kv-sticky-column'],
                // 'contentOptions' => [
                //     'style' => 'vertical-align: middle;white-space: nowrap;'
                // ],
                //'contentOptions' =>['class' => 'table_class','style'=>'display:block;'],
                //'hAlign'=>'center',
            
            ],

            [
                'attribute' => 'actividades',
                //'headerOptions' => ['style'=>'text-align:left'],
                'format' => 'html',
                'width'=>'310px',
                'vAlign'=>'middle',

                //'hAlign'=>'center',
            
            ],

            
            [
                'attribute' => 'id_cargo',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Cargo::get_cargo(), 
                'value'=> 'cargo.cargo',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                
            ],


            [
                'attribute' => 'supervisor',
                //'headerOptions' => ['style'=>'text-align:left'],
                'format' => 'html',
                'width'=>'300px',
                'vAlign'=>'middle',
                //'hAlign'=>'center',
            
            ],

            [
                'attribute' => 'id_area',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Area::get_area(), 
                'value'=> 'area.area',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
         
            ],
         
            ['class' => 'kartik\grid\ActionColumn',
                          'header' => 'Acciones',
                          'template' => '{update}{delete}',
                 'buttons' => [

                   
                    'update' => function ($url,$model) {

                        return Html::a(

                            '<span class="glyphicon glyphicon-refresh"></span>',

                            $url);

                    },

                    'link' => function ($url,$model,$key) {

                            return Html::a('Action', $url);

                    },

                ],
                          
            ],
        ],
    ]); ?>
</div>
</div>
</div>
