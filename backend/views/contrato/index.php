<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\bootstrap\Collapse;
use backend\models\Funcionario;
use backend\models\Area;
use backend\models\Cargo;
use backend\models\Escalafon;
use backend\models\Modulo;
use backend\models\Fondopensiones;
use backend\models\Arl;
use backend\models\Fondosalud;




/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ContratoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contratos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contrato-index">



<?php echo Collapse::widget([
    'items' => [
        [

            'label' => 'Buscar',
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



    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(['id' => 'contrato-grid']) ?>

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
                'attribute' => 'num_resolucion',
                'label' => 'Resolución',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>'raw',
                'value' => function($data) {
                   return $data->num_resolucion;
                }, 
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
              
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

            [
                'attribute' => 'id_funcionario',
                'label'=> 'identificación',
                'headerOptions' => ['style'=>'text-align:center'],
                'filter'=>Funcionario::get_funcionario(), 
                'value'=> 'funcionario.identificacion',
                'format'=>'raw',
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               
            ],

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
                'attribute' => 'id_escalafon',
                'value'=> 'escalafon.escalafon',
                'filter'=>Escalafon::get_escalafon(),
                'format'=>'raw',    
                'width'=>'100px',
                'vAlign'=>'middle',
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
                'attribute' => 'valor_contrato',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>['decimal', 2],
                'width'=>'100px',
                'vAlign'=>'middle',
               
            ],

            [

                'label' => 'Asignación mensual',
                'headerOptions' => ['style'=>'text-align:center'],
                'format'=>['decimal', 2],
                 'value' => function($data) {
                   return ($data->valor_contrato)/($data->dias_transcurridos($data->fecha_inicio,$data->fecha_fin))*30;
                }, 
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
            ],

             [

                'header' => 'dias',
                'format'=>'raw',
                 'value' => function($data) {
                   return $data->dias_transcurridos($data->fecha_inicio,$data->fecha_fin);
                }, 
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
            ],

            

            [

                'attribute' => 'vr_hora',
                'format'=>['decimal', 0],
                'width'=>'100px',
                'vAlign'=>'middle',
                'hAlign'=>'center',
               
            ],


           
            // [

            //     'attribute' => 'horas_catedra',
            //     'format'=>'raw',
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
            //     'hAlign'=>'center',

            // ],

            
            // [

            //     'attribute' => 'horas_reunion',
            //     'format'=>'raw',
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
            //     'hAlign'=>'center',
            // ],


            // [

            //     'attribute' => 'horas_sustentacion',
            //     'format'=>'raw',
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
            //     'hAlign'=>'center',
            // ],

            // [

            //     'attribute' => 'horas_examenes_finales',
            //     'format'=>'raw',
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
            //     'hAlign'=>'center',
            // ],

            
                      
            // [

            //     'attribute' => 'horas_trabajo_de_grado',
            //     'format'=>'raw',
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
            //     'hAlign'=>'center',
            // ],

            // [

            //     'header' => 'horas',
            //     'format'=>'raw',
            //     'value' => function($data) {
            //        return $data->gettotal();
            //     }, 
            //     'width'=>'100px',
            //     'vAlign'=>'middle',
            //     'hAlign'=>'center',
            // ],

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
                'attribute' => 'observaciones',
                'format'=>'raw',
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


          