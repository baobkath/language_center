<?php
namespace frontend\controllers;
/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
use frontend\models\FMagazin;
use frontend\models\FContentMagazin;
use yii\web\Controller;
use Yii;
/**
 * Description of magazinController
 *
 * @author HP 6200 Pro
 */
class MagazinController extends Controller{
    public function actionRegistermagain(){
        $magazin = new FMagazin();       
        if ($magazin->load(Yii::$app->request->post())) {
            \date_default_timezone_set('Asia/Ho_Chi_Minh');
            $magazin->create_at = date('Y-m-d'); 
            $magazin->Day = -1;
            $old_magazin = FMagazin::find()->where(['email' => $magazin->email])->one();
            if($old_magazin){
                Yii::$app->session->setFlash('error-magazin', Yii::t('frontend','You registed email {0}.',$magazin->email));            
                $this->redirect(\Yii::$app->request->getReferrer());
            }
            else{
                $contentmagazin = FContentMagazin::findOne(['Day' => 0, 'Level' => $magazin->level]);
                if(!$contentmagazin){
                     Yii::$app->session->setFlash('error-magazin', Yii::t('magazin','Sorry! We haven\'t excersice for you. We will send later'));
                     $magazin->save();
                     $this->redirect(\Yii::$app->request->getReferrer());                     
                }
                $message = Yii::$app->mailer->compose('@common/mail/register_magazin', ['contentmagazin' => $contentmagazin,'magazin'=>$magazin]);
                
                $message->setTo($magazin->email)
                ->setFrom([Yii::$app->params['salesEmail'] => 'Magin Gam LTD'])
                ->setSubject($contentmagazin->Subject);
                if($message->send()){
                    //die('Hello');
                    $magazin->Day++;
                    $magazin->save();
                    Yii::$app->session->setFlash('success-magazin', Yii::t('frontend','Thank your register. The first exercise sent your email!'));
                } else {
                    Yii::$app->session->setFlash('error-magazin', Yii::t('frontend','There was an error sending email.'));
                }
                $this->redirect(\Yii::$app->request->getReferrer());
            }        
        }
    }
    
    public function actionSendmail(){
        
    }
}
