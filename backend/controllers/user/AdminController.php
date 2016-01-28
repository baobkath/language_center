<?php

namespace backend\controllers\user;

use yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\rbac\DbManager;

use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use backend\models\BUser;

use backend\models\BNotifications;

use dektrium\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController {

    /** @inheritdoc */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'confirm' => ['post'],
                    'block' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'block', 'confirm','info',],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return BUser::isAdmin(\Yii::$app->user->identity->username);
                        }
                    ],
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'block', 'confirm', 'role', 'removerole','update-profile','info','assignments'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return BUser::isSuperAdmin(\Yii::$app->user->identity->username);
                        }
                    ]
                ]
            ]
        ];
    }
    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        if(Yii::$app->getRequest()->getCookies()->has('language')){
            Yii::$app->language = Yii::$app->getRequest()->getCookies()->getValue('language');
            //die(Yii::$app->language);
        }
       

        return true; // or false to not run the action
    }
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex(){
        $searchModel  = \Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->search($_GET);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * Remove member role
     * after that set admin role for user
     * @param $id: user id from user table
     * @return redirect to admin/index page
     */
    public function actionRole($id) {

        $r = new DbManager;
        $r->init();
        if ($id > 0) {
            // remove member role for this user
            $member = $r->getRole('member');
            $r->revoke($member, $id);
            // assign this role for user by user id
            $admin = $r->getRole('admin');
            $r->assign($admin, $id);
            // update user table
            $this->updateUser($id, BUser::getAuthName('ROLE_ADMIN'));
            Yii::$app->getSession()->setFlash('user.success', Yii::t('user', 'User has been updated'));
        } else {
            Yii::$app->getSession()->setFlash('user.success', Yii::t('error', 'Sorry there is something wrong!'));
        }

        return $this->redirect(['index']);
    }

    /**
     * Remove admin role for user
     * after that set member role for user
     * @param $id: user id from user table
     * @return redirect to admin/index page
     */
    public function actionRemoverole($id) {
        $r = new DbManager;
        $r->init();
        if ($id > 0) {
            // remove admin role for this user
            $admin = $r->getRole('admin');
            $r->revoke($admin, $id);
            // get member role to add to this user
            $member = $r->getRole('member');
            $r->assign($member, $id);
            // update user table
            $this->updateUser($id, BUser::getAuthName('ROLE_MEMBER'));
            Yii::$app->getSession()->setFlash('user.success', Yii::t('user', 'User has been updated'));
        } else {
            Yii::$app->getSession()->setFlash('user.success', Yii::t('error', 'Sorry there is something wrong!'));
        }

        return $this->redirect(['index']);
    }
    
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate(){
        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
        ]);

        $this->performAjaxValidation($user);

        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            $this->updateUser($user->id, BUser::getAuthName('ROLE_MEMBER'));
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been created'));
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'user' => $user
        ]);
    }
    
    

    protected function updateUser($id, $role) {
        $r = (new yii\db\Query())->createCommand();
        $r->sql = "UPDATE user SET role = '$role' WHERE id = '$id'";
        $result = $r->execute();
        if ($result) {
            Yii::$app->getSession()->setFlash('user.success', Yii::t('app', 'User has been updated'));
        } else {
            Yii::$app->getSession()->setFlash('user.success', Yii::t('error', 'Sorry there is something wrong!'));
        }
    }
    
   

}
