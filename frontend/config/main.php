<?php
$params = array_merge (
        require (__DIR__ . '/../../common/config/params.php'), 
        require (__DIR__ . '/../../common/config/params-local.php'), 
        require (__DIR__ . '/params.php'), 
        require (__DIR__ . '/params-local.php') 
        );
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'vi',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'security' => 'frontend\controllers\user\SecurityController',
                
            ],
        ],
    ],
    'components' => [
        'user' => [
            'identityCookie' => [
                'name' => '_frontendUser', // unique for backend
                'path' => '/frontend/web' // correct path for backend app.
            ]
        ],
        'request'=>[
            'class' => 'common\components\Request',
            'web'=> '/frontend/web'
        ],
        'urlManager' => [
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                //'suffix' => '.html',
                'rules' => [
                    'show/<id:\d+>-<slug>' => 'languecenter/view',
                ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@frontend/views/user'
                ],
            ],
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
        'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => __DIR__ . '/../runtime',
        ],
    ],
    'params' => $params,
];
