<?php

namespace console\controllers;

use console\models\CMagazin;
use frontend\models\FContentMagazin;
use yii\console\Controller;
use frontend\models\FConfigParam;
use yii;

/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

/**
 * Description of MailController
 *
 * @author HP 6200 Pro
 */
class TestController extends Controller{
    public function actionIndex() {
        
        //\date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d'); 
        //$date = formatTime::convert($date, 'datetime');
        $ali = Yii::getAlias('frontend');
        $file = dirname(dirname(__DIR__)).'\frontend\web\files\N0-0.pdf';
        echo $file;
    }
    
    public function actionDay(){
        $magazins = CMagazin::find()->all();
        $succes = 0;
        $fail = 0;
        $limit_mail = FConfigParam::find()->where(['name' => 'NUMBER_MAIL_MAGAZIN'])->one();
        if($limit_mail){
            $limit_mai = $limit_mail->value;
        }
        else{
            $limit_mai = 7;
        }
        foreach ($magazins as $magazin){
            if(($magazin->Day >= -1)&&($magazin->Day < $limit_mai)){
                $contentmagazin = FContentMagazin::findOne(['Day' => $magazin->Day+1, 'Level' => $magazin->level]);
                if($contentmagazin){
                    $message = Yii::$app->mailer->compose('@common/mail/send_day_magazin', ['contentmagazin' => $contentmagazin,'magazin'=>$magazin]);
                    //$message->attach(dirname(dirname(__DIR__)).'/frontend/web/files/'.$magazin->level.'-'.$magazin->getDaytoNow().'.docx');
                    $message->setTo($magazin->email)
                    ->setFrom([Yii::$app->params['salesEmail'] => 'Magin Gam LTD'])
                    ->setSubject('Bài tập dành cho buổi '.$magazin->getDaytoNow().' sau đăng ký');
                    if($message->send()){
                        $magazin->Day++;
                        $magazin->save();
                        $succes++;
                    }else{
                        $fail++;
                    }
                }
            }
        }
        return 'Thành công: '.$succes.'- Thất bại: '.$fail;
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
