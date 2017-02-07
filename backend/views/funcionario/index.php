<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\date\DatePicker;
use yii\bootstrap\Collapse;
use backend\models\Funcionario;
use backend\models\Genero;
use backend\models\TipoFuncionario;
use backend\models\Rh;
use backend\models\Estadocivil;
use yii\helpers\ArrayHelper;
use backend\models\Banco;




/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FuncionarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Funcionarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-index">

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
    //'showPageSummary'=>true,
    'pjax'=>true,
    'striped'=>true,
    'condensed'=>true,
    'responsive'=>true,
    'responsiveWrap'=>true,
    'resizableColumns'=>true,
    //'resizeStorageKey'=>Yii::$app->user->id . '-' . date("m"),
    'hover'=>true,
    
    'rowOptions' => function($model) {
        if ($model->estado == '0') 
        {
            return ['class'=>'danger'];
        }
       
    },

    //'panel'=>['type'=>'primary', 'heading'=>'Contratos'],
    'toolbar' =>  [
        ['content'=>
        
         
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')
                ]),

        'footer'=>false
        ],

        '{export}',
        '{toggleData}'
    ],



    //'toggleDataContainer' => ['class' => 'btn-group-sm'],
    //'exportContainer' => ['class' => 'btn-group-sm'],


        'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> Datos funcionarios Unimayor</h3>',
        'type'=>GridView::TYPE_PRIMARY,
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
                
           // [
           //      'class'=>'kartik\grid\ExpandRowColumn',
           //      'width'=>'70px',
           //      'value'=>function ($model, $key, $index, $column) {
           //          return GridView::ROW_COLLAPSED;
           //      },

           //      'detail' => function ($model, $key, $index, $column) {
           //          $searchModel = new DatosacademicosSearch();
           //          $searchModel->id_datos_acad = $model->id_funcionario;
           //          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

           //          return Yii::$app->controller->renderPartial('index', [
           //              'searchModel' => $searchModel,
           //              'dataProvider' => $dataProvider,

           //              ]);
           //          //return array('id_datos_acad:' => $model->Datosfamiliares->id_datos_acad);
           //      },

           //      //'detailUrl'=> Url::toRoute(['trendsupervision/detail']),
           //      'headerOptions'=>['class'=>'kartik-sheet-style'] ,
           //      'expandOneOnly'=>true,
           //  ],

            [
                
                'attribute' => 'nombres',
                'label' => 'Nombre Funcionario',
                'value' => function($data) {
                    return $data->getFullName();
                 }, 
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                

            ],
             

            [
                
                'attribute' => 'identificacion',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                

            ],


             [

                'attribute' => 'fecha_exp',
                'headerOptions' => ['style'=>'text-align:center'],
                'value' => 'fecha_exp',
                'format' => 'raw',
                'options' => ['style' => 'width: 30%;'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_exp',
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
                
                'attribute' => 'lugar_expedicion',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                

            ],

           

            [
               
                'attribute' => 'id_genero',
                'value'=>'genero.genero',
                'filter'=>Genero::get_genero(), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'label'=>'Genero',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                //'group'=>true,

            ],

            
            [
                
                'attribute' => 'id_tipo_funcionario',
                'value'=>'tipoFuncionario.tipo_funcionario',
                'filter'=>Tipofuncionario::get_tfuncionario(), 
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                //'group'=>true,
                
            ],
          
            // [
            //     'class' => 'kartik\grid\EditableColumn',
            //     'attribute' => 'fecha_nac',
            //     'format'=>'raw',
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
            //     'headerOptions'=>['class'=>'kv-sticky-column'],
            //     'contentOptions'=>['class'=>'kv-sticky-column'],
            //     'editableOptions'=>['header'=>'Name', 'size'=>'md']

            // ],

            [

                'attribute' => 'fecha_nac',
                'headerOptions' => ['style'=>'text-align:center'],
                'value' => 'fecha_nac',
                'format' => 'raw',
                'options' => ['style' => 'width: 30%;'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_nac',
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
               
                'attribute' => 'lugar_nac',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                
            ],

            
            [
                
                'header' => 'Edad',
                'value' => function($data) {
                   return $data->get_edad()-$data->fecha_nac . "  años";
                }, 
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'hAlign'=>'center',
                'hAlign'=>'center',


                
            ],

            [
               
                'attribute' => 'id_estado_civil',
                'value'=>'estadocivil.estado_civil',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Estadocivil::get_estadocivil(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
              

            ],

               
            [
                
                'attribute' => 'id_rh',
                'value'=>'rh.rh',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Rh::get_factorsanguineo(),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'format'=>'raw',
                'width'=>'200px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                //'group'=>true,
                

            ],


            [
                'attribute' => 'direccion',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                
            ],
            
            [
               
                'attribute' => 'telefono',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               

            ],

            [
              
                'attribute' => 'tel_movil',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               

            ],

            [
               
                'attribute' => 'email',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
             

            ],

            

            [
                'attribute' => 'id_banco',
                'filter'=>Banco::get_banco(), 
                'value'=> 'banco.banco',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',

            ],

            [
                'attribute' => 'numero_cuenta',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',

            ],
            

          

            [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'estado', 
                'vAlign'=>'middle',
            ],
           
           //'id_funcionario',
           
            
           ['class' => 'kartik\grid\ActionColumn',
                          'header' => 'Acciones',
                          'template' => '{update}{delete}',
                          
            ],



        ],
    ]); ?>

    
    

</div>
