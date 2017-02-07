<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CargoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cargos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <?php Pjax::begin(['id' => 'cargo-grid']) ?>

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
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Agregar cargo'), 
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

        //'{export}',
        //'{toggleData}'
    ],

    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> Datos cargo</h3>',
        'type'=>'primary',

        
    ],
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
  

        'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],

            [
                'attribute' => 'cargo',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                              
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
                                        'data-url' => Url::to(['update', 'id' => $model->id_cargo]),
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
            'header' => '<h4 class="modal-title">Complete Información cargo</h4>',
            'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">Cerrar</a>',
        ]);
         
        echo "<div class='well'></div>";
         
        Modal::end();
        ?>

</div>
