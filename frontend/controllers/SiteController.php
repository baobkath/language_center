<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactMaginForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use frontend\models\FLanguecenter;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\filters\AccessControl;
use frontend\models\FConfigParam;
use yii\web\Cookie;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
       
       $query = FLanguecenter::find()->where(['is_show' => 1])->orderBy('ordinal_view ASC');
       $limit_Lang_home = FConfigParam::find()->where(['name' => 'NUMBER_LANGUE_IN_HOME'])->one();
        $count = $query->count();
        $pagination = new Pagination([
            'defaultPageSize' => $limit_Lang_home->value,
            'totalCount' => $count]);
        $models = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', [
            'models' => $models,
            'pagination'=>$pagination,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $contactmagin = new ContactMaginForm();
        if ($contactmagin->load(Yii::$app->request->post()) && $contactmagin->validate()) {
            if ($contactmagin->sendEmail('baobkath@gmail.com')) {
                Yii::$app->session->setFlash('success-magin-email', Yii::t('frontend','Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error-magin-email', Yii::t('frontend','There was an error sending email.'));
            }
            
            return $this->refresh();           
        } else {
            return $this->render('contact', [
                'contactmagin' => $contactmagin,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('frontend','Check your email for further instructions.'));

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', Yii::t('frontend','Sorry, we are unable to reset password for email provided.'));
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('frontend','New password was saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionLanguage() {
        if(isset($_POST['langue'])){
            $language = $_POST['langue'];            
        }
        else{
            $language=Yii::$app->language;
        }
        
        if(Yii::$app->language != $language){
            
            Yii::$app->language = $language;
            if(Yii::$app->getRequest()->getCookies()->has('language')){
                //die('1'.$language);
               $lang =  Yii::$app->getRequest()->getCookies()->get('language');
               Yii::$app->getResponse()->getCookies()->remove($lang);
            }
            $languageCookie= new Cookie();
            $languageCookie->name='language';
            $languageCookie->value=$language;        
            $languageCookie->expire = time() + 60 * 60 * 24 * 30;
            Yii::$app->getResponse()->getCookies()->add($languageCookie); 
            
            //Yii::$app->getRequest()->getCookies()->add($languageCookie);
            $this->redirect(\Yii::$app->request->getReferrer());
            
        }
        return $language; 
    }
    
    public function actionSend(){
        //die('/files/sitemap.xml');
        return Yii::$app->mailer->compose()
            ->attach(dirname(dirname(__DIR__)).'/frontend/web/files/N0-0.docx')
            //->attachContent('Attachment content', ['fileName' => '/sitemap.xml', 'contentType' => 'text/plain'])
            ->setTo('baobkath@gmail.com')
            ->setFrom('baobkath@gmail.com')
            ->setSubject('demo')
            ->setTextBody('demo')
            ->send();
    }
}
