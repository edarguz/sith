<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'sith-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    
    'modules' => [

       'gridview' =>  [
       'class' => '\kartik\grid\Module',
        
         ],
    
       'dynagrid'=> [
        'class'=>'\kartik\dynagrid\Module',
        // other module settings
        ],

        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module'
        ],

 
    ],

    'components' => [
       
        

        'urlManager' => [ 'class' => 'yii\web\UrlManager', 
        // Disable index.php 
            'showScriptName' => false, 
            // Disable r= routes 
            'enablePrettyUrl' => true, 
            'enableStrictParsing' => false,
            'suffix' => '.json',
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view', 
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>', 
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+\-\w+>/<id:\d+>' => '<controller>/view',  
            ],
       ], 

        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        
        
    ],
   'params' => [
      'icon-framework' => 'fa',  // Font Awesome Icon framework
    ]
];
