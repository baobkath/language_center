<?php
$params = array_merge (
        require (__DIR__ . '/../../common/config/params.php'), 
        require (__DIR__ . '/../../common/config/params-local.php'), 
        require (__DIR__ . '/params.php'), 
        require (__DIR__ . '/params-local.php') );

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'vi',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'security' => 'backend\controllers\user\SecurityController',
            ],
            
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module',
            // 'downloadAction' => 'gridview/export/download',
            'downloadAction' => 'export',
            ],
    ],
    'components' => [
        'user' => [
            'identityCookie' => [
                'name' => '_backendUser', // unique for backend
                'path' => '/backend/web' // correct path for backend app.
            ]
        ],
        'request'=>[
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin',
            'cookieValidationKey' => 'eQk_bUZiiJuO5gGRwKp7v1UQCaGrtN_Q',
        ],
        'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@backend/views/user'
                ],
            ],
        ],
        /*'view' => [
            'theme' => [
                'pathMap' => [
                   '@backend/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],*/
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
        'session' => [
            'name' => 'PHPBACKSESSID',
            'savePath' => __DIR__ . '/../runtime',
        ],
    ],
    'params' => $params,
];
