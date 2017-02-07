<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TipotituloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tipo titulo');
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>'), ['create'], ['class' => 'btn btn-success'])
                

                 . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')])


         ?>
    </p>

<div class="tipotitulo-index">
<h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <?php Pjax::begin(['id' => 'tipo título-grid']) ?>

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
    //'panel'=>['type'=>'primary', 'heading'=>'Contratos'],
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
                'attribute' => 'tipotitulo',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                              
            ],

            [
                'attribute' => 'vr_hora',
                'format'=>['decimal', 0],
                'width'=>'100px',
                'vAlign'=>'middle',
                              
            ],


           [

            'class' => 'kartik\grid\ActionColumn',
                      'header' => 'Acciones',
                      'template' => '{update}{delete}',
                             
            ],





        ],
    ]); ?>

    <?php Pjax::end() ?>

    

</div>


          