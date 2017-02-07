<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\models\Periodoacademico;
use backend\models\Funcionario;
use backend\models\Semestre;
use backend\models\Programa;
use backend\models\Jornada;
use yii\bootstrap\Collapse;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ModuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Modulos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

    <?php Pjax::begin(['id' => 'modulo-grid']) ?>

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
        ['content'=>
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Agregar modulo'), 
                'class'=>'btn btn-success',
                'id' => 'activity-index-link',
                'data-toggle' => 'modal',
                'data-target' => '#modal',
                'data-url' => Url::to(['create']),
                'data-pjax' => '0',

                ]) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')]),
        'footer'=>false
        ],

        '{export}',
        '{toggleData}'
    ],

    //'panel'=>['type'=>'primary', 'heading'=>'Contratos'],
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Datos modulo</h3>',
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
                'attribute' => 'modulo',
                 'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
              
            ],

            [
                'attribute' => 'id_programa',
                'value' => 'programa.programa',
                //'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(Programa::find()->orderBy('programa')->asArray()->all(), 'id_programa', 'programa'), 
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
              
            ],

            [
                'attribute' => 'creditos',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>'',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
              
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
                                        'data-url' => Url::to(['update', 'id' => $model->id_modulo]),
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
            'header' => '<h4 class="modal-title">Complete Información del módulo</h4>',
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">Cerrar</a>',
        ]);
         
        echo "<div class='well'></div>";
         
        Modal::end();
        ?>


</div>
