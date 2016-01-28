<?php

namespace frontend\controllers;

use Yii;
use frontend\models\FLanguecenter;
use frontend\models\FRateCenter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use frontend\models\ContactForm;

use frontend\models\FConfigParam;
use common\models\formatTime;



/**
 * LanguecenterController implements the CRUD actions for FLanguecenter model.
 */
class LanguecenterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    //'rate' => ['post'],
                ],
            ],
        ];
    }
    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }
        //die(\Yii::$app->getRequest()->getCookies()->getValue('language'));
        

        return true; // or false to not run the action
    }

    /**
     * Lists all FLanguecenter models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $limit_Lang_home = FConfigParam::find()->where(['name' => 'NUMBER_LANGUE_IN_HOME'])->one();
        $query = FLanguecenter::find()->where(['is_show' => 1])->orderBy('ordinal_view ASC');
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
     * Displays a single FLanguecenter model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $slug = null)
    {
        $this->layout = '@frontend/views/layouts/layout-frontend.php';
        $langue = $this->findModel($id);
        if ($slug != $langue->slug) {
            return $this->redirect(['languecenter/view', 'id' => $id, 'slug' => $langue->slug]);
        }
        $langue->number ++;
        $langue->save();
        $contact = new ContactForm();
        
        $rate = new FRateCenter();
        $rate->value = round($langue->rate);
        if ($contact->load(Yii::$app->request->post()) && $contact->validate()) {
            if ($contact->sendEmail($langue->email)) {
                Yii::$app->session->setFlash('success-email', Yii::t('frontend','Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error-email', Yii::t('frontend','There was an error sending email.'));
            }
           // die('hello1');
            return $this->refresh();           
        }
        
        
        return $this->render('view', [
            'rate'=> $rate,
            'model' => $langue,
            'contact'=>$contact,
        ]);
        
    }

   

    /**
     * Finds the FLanguecenter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FLanguecenter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FLanguecenter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionRate(){
        if(isset($_POST['rate'])&&isset($_POST['idlang'])){
            $new_rate=intval($_POST['rate']);
            $idlang=intval($_POST['idlang']);
            if (!Yii::$app->session->isActive) {
                Yii::$app->session->open();
            } 
            $user_id = Yii::$app->session->getId();
            $model=FRateCenter::find()->where(['user_session' =>$user_id,'id_center'=>$idlang])->one();

            if($model===null){/// So no old recorde 
                $rate = new FRateCenter();
                $rate->id_center = $idlang;
                $rate->user_session = $user_id;
                $rate->value = $new_rate;
                $rate->rate_at = time(); 
                $rate->rate_at = formatTime::convert($rate->rate_at, 'datetime');
                $rate->save(); 
                $query = FRateCenter::find()->where(['id_center' => $idlang]);
                $total = $query->count();
                $ratecenters = $query->all();
                $sum_rate = 0;
                
                foreach ($ratecenters as $ratecenter){
                    $sum_rate = $sum_rate +$ratecenter->value;
                }
                $langue = FLanguecenter::find()->where(['ID' => $idlang])->one();
                $langue->rate = $sum_rate/$total;
                $langue->save();
                Yii::$app->session->setFlash('success-rate', Yii::t('frontend','You rated success {0}. Thank you for your rating!',$rate->value));
            }
            else{                
                Yii::$app->session->setFlash('error-rate', Yii::t('frontend','You used to rate {0} star. Thank you for your rating!',$model->value));
            }
            //return $this->run('view', ['id'=>$idlang]);
            $this->redirect(\Yii::$app->request->getReferrer());

        }
    }
}
