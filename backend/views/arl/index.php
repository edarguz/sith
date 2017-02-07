<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ArlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Administración de Riesgos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?php Pjax::begin(['id' => 'arl-grid']) ?>

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
    //'panel'=>['type'=>'primary', 'heading'=>'Contratos'],
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Administración de Riesgos</h3>',
        'type'=>'primary',
        'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',  
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]) . " " . Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning']),
        'footer'=>false,

       
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

            //'id_arl',
            'arl',

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
                                        'data-url' => Url::to(['update', 'id' => $model->id_arl]),
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
            'header' => '<h4 class="modal-title">Complete Información de la ARL</h4>',
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">Cerrar</a>',
        ]);
         
        echo "<div class='well'></div>";
         
        Modal::end();
        ?>

</div>
