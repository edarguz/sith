<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets_b\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\icons\Icon;
use yii\web\AssetBundle;

Icon::map($this);


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SITH',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' =>  'Inicio', 'url' => ['/site/index']],

        
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];


    } else {

         $menuItems[]=['label' =>'Catalogos',
                    'items' => [
                        ['label' => 'Fondo de Pensión', 'url' => ['/fondopensiones/index']],
                        ['label' => 'Administración de Riesgos', 'url' => ['/arl/index']],
                        ['label' => 'Fondo de Salud', 'url' => ['/fondosalud/index']],
                       
                        '<li class="divider"></li>',

                        ['label' => 'Facultad', 'url' => ['/facultad/index']],
                        ['label' => 'Programa', 'url' => ['/programa/index']],
                        ['label' => 'Semestre', 'url' => ['/semestre/index']],
                        ['label' => 'Escalafón', 'url' => ['/escalafon/index']],
                        ['label' => 'Area', 'url' => ['/area/index']],

                        '<li class="divider"></li>',

                        ['label' => 'Bancos', 'url' => ['/banco/index']],

                           '<li class="divider"></li>',
                   
                        ['label' => 'Tipo Funcionario', 'url' => ['/tipofuncionario/index']],
                        ['label' => 'Tipo Novedad', 'url' => ['/tiponovedad/index']],
                        ['label' => 'Cargos', 'url' => ['/cargo/index']],
                        ['label' => 'Tipo Título', 'url' => ['/tipotitulo/index']],
                        ],
                  ];    

    
                $menuItems[]=['label' =>'Datos Trabajador',
                    'items' => [
                        ['label' => 'Datos Personales', 'url' => ['/funcionario/index']],
                         '<li class="divider"></li>',
                                                
                        ['label' => 'Datos Familiares', 'url' => ['/datosfamiliares/index']],

                        ['label' => 'Datos Académicos', 'url' => ['/datosacademicos/index']],
                        ],
                  ];



                $menuItems[]=['label' =>'Labor Academica',
                    'items' => [
                        
                        ['label' => 'Modulo', 'url' => ['/modulo/index']],
                        ['label' => 'Labor Docente', 'url' => ['/labordocente/index']],
                        ['label' => 'Labor Adicional', 'url' => ['/laboradicional/index']],
                        ['label' => 'Labor contratista', 'url' => ['/laborcontratista/index']],
                        ],
                  ];

               

               $menuItems[]=['label' =>'Contratación',
                    'items' => [
                       ['label' => 'Contratos', 'url' => ['/contrato/index']],
                         '<li class="divider"></li>',
                                                
                        ['label' => 'Novedades', 'url' => ['/novedad/index']],
                         
                        ],
                  ];


                $menuItems[]=['label' =>'Usuarios',
                    'items' => [
                       ['label' => 'Crear usuarios', 'url' => ['/site/signup']],
                         '<li class="divider"></li>',
                                                
                                                
                        ],
                  ];




        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left"><img src ="/sith/images/cmc.png"> Institución Universitaria Colegio Mayor del Cauca <?= date('Y') ?></p>
        
       
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
