<?php
 namespace common\components;
 
use dektrium\rbac\Module as RbacModule;
use yii\filters\AccessControl;
use backend\models\BUser;
/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

class Module extends RbacModule
{
     /** @var bool Whether to show flash messages */
    public $enableFlashMessages = true;

    /** @var string */
    public $defaultRoute = 'role/index';
    
    /** @var array */
    public $admins = [];
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return BUser::isSuperAdmin(\Yii::$app->user->identity->username);
                        },
                    ]
                ],
            ],
        ];
    }
}