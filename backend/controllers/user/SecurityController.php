<?php

namespace backend\controllers\user;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Yii;
use backend\models\LoginForm;

use dektrium\user\controllers\SecurityController as BaseSecurityController;

class SecurityController extends BaseSecurityController {

    public function behaviors() {
        $behaviour = parent::behaviors();
        $behaviour['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['login'],
            'rules' => [
                [
                    'allow' => true,
                    
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
            //die(Yii::$app->language);
        }
        $this->view->params['title'] = 'title default';
        

        return true; // or false to not run the action
    }

    public function actionLogin() {
        $model = \Yii::createObject(LoginForm::className());
//
//        $this->performAjaxValidation($model);

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

//        $model = new LoginForm();

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {

            if (\Yii::$app->user->can('admin')) {
                return $this->goBack();              
            }
            else {
                
                //return $this->goBack();
                Yii::$app->session->setFlash('error-login', 'Your account can\'t access this page.');
                \Yii::$app->user->logout();
                return $this->refresh();
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
