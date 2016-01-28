<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    
    'components' => [ 
        'language' => 'vi',
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
	    'defaultRoles' => ['member'], // here define your roles
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                'module/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ]
        ],
        // message translation
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'common' => 'common.php',
                        'languecenter' => 'languecenter.php',
                        'advertise' =>'advertise.php',
                        'user'=>'user.php',                        
                        'app/error' => 'error.php',
                        'user'=>'user.php',
                        'backend'=>'backend.php',
                        'magazin'=>'magazin.php',
                    ]
                ]
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'controllerMap' => [
                'admin' => [
                    'class'  => 'backend\controllers\user\AdminController',
                    'layout' => '@backend/views/layouts/layoutbackend',
                ],
            ],
            //'admins' => ['admin']
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
            'layout'=>'@backend/views/layouts/layoutbackend'
        ],
        
        // 
    ],
];
