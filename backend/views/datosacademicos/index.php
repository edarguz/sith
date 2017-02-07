<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use backend\models\Tipotitulo;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Funcionario;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DatosacademicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Datos Académicos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datosacademicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
     
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
      
    <?php Pjax::begin(['id' => 'datosacademicos-grid']) ?>

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

     'toolbar' =>  [
        // ['content'=>
        //     Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Agregar programa'), 
        //         'class'=>'btn btn-success',
        //         'id' => 'activity-index-link',
        //         'data-toggle' => 'modal',
        //         'data-target' => '#modal',
        //         'data-url' => Url::to(['create']),
        //         'data-pjax' => '0',

        //         ]) . ' '.
        //     Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')]),
        // 'footer'=>false
        // ],

        '{export}',
        '{toggleData}'
    ],
    
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Contratos</h3>',
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
                'label'=> 'Funcionario',
                'headerOptions' => ['style'=>'text-align:center'],
                'value'=>'funcionario.fullName',
                'filter'=>Funcionario::get_funcionarioName(), 
                //'filterType'=>GridView::FILTER_SELECT2,
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                //'hAlign'=>'center',

               

            ],


           [
                'attribute' => 'id_titulo',
                'label' => 'Tipo Título',
                'filter'=>Tipotitulo::get_tipotitulo(), 
                'value'=> 'tipotitulo.tipotitulo',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'right',
               
            ],

            [
                'attribute' => 'titulo',
                'label' => 'Título',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               
            ],

            [
                'attribute' => 'fecha_titulo',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_titulo',
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
                'attribute' => 'institucion',
                'label' => 'Institución',
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center'],
                'width'=>'100px',
                'vAlign'=>'middle',
            ],


          ['class' => 'kartik\grid\ActionColumn',
                          'header' => 'Acciones',
                          'template' => '{update}{delete}',
                          
            ],
        ],
    ]); ?>
</div>
