<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use yii\bootstrap\Collapse;
use backend\models\Funcionario;
use backend\models\Datosfamiliares;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DatosfamiliaresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Datos familiares');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datosfamiliares-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) 
         . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')])
        ?>
    </p>

<?php Pjax::begin(); ?>    

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
     'toolbar' =>  [
        ['content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success'])

                 . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Resetear Grid')]),
        'footer'=>false
        ],

        '{export}',
        '{toggleData}'
    ],
    
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-grain"></i> Datos familiares</h3>',
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
                'group'=> 'true',
               
            ],

          
            [
                
                'attribute' => 'fullNombres',
                'label' => 'Hijos',
                'headerOptions' => ['style'=>'text-align:center'],
                //'filter'=>Datosfamiliares::get_hijosName(), 
                'filterType'=>GridView::FILTER_SELECT2,
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                

            ],

            [
                'attribute' => 'genero',
                'label' => 'Género',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
              
            ],


            [
                'attribute' => 'fecha_nacimiento',
                'label' => 'Fecha de Nacimiento',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_nacimiento',
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
                
                'attribute' => 'edad',
                'label' => 'Edad',
                'headerOptions' => ['style'=>'text-align:center'],
                'value' => function($data) {
                   return $data->get_edad()-$data->fecha_nacimiento . "  años";
                }, 
                'format'=>'raw',
                'width'=>'100px',
                'hAlign'=>'right',
                'vAlign'=>'middle',


                
            ],


            [

            'class' => 'kartik\grid\ActionColumn',
                      'header' => 'Acciones',
                      'template' => '{update}{delete}',
                             
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
