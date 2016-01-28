<?php

namespace frontend\controllers\user;

use Yii;
use dektrium\user\models\LoginForm;
use yii\helpers\Url;
use dektrium\user\controllers\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviour = parent::behaviors();
        $behaviour['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['login'],
            'rules' => [
                [
                    'allow' => true
                ]
            ]
        ];
        return $behaviour;
    }

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        if(Yii::$app->getRequest()->getCookies()->has('language')){
            Yii::$app->language = Yii::$app->getRequest()->getCookies()->getValue('language');
        }
        $this->view->params['title'] = 'default title';
        return true;
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            $this->goHome();
        }

        $model = \Yii::createObject(LoginForm::className());

        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            if (\Yii::$app->user->can('login_admin')) {
                echo Url::to(['/admin']);              
            }
            
            return $this->goHome();
        }

        return $this->render('login', [
            'model'  => $model,
        ]);
    }

    /**
     * Logs the user out and then redirects to the homepage.
     * @return \yii\web\Response
     */
    public function actionLogout() {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

}
