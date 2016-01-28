<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\FAdvertiseClick;
use common\models\formatTime;
/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

/**
 * Description of AdvertiseController
 *
 * @author HP 6200 Pro
 */
class AdvertiseController extends Controller{

    public function actionClick() {
        if(isset($_POST['ad'])){
            $IdAd = $_POST['ad'];
            $click_ad = new FAdvertiseClick;
            $click_ad->IdAd = $IdAd;
            $ipaddress = Yii::$app->request->userIP;
            $click_ad->Ip = $ipaddress;
            $click_ad->click_at = time();
            $click_ad->click_at = formatTime::convert($click_ad->click_at, 'datetime');
            $click_ad->save();
            return 1;
        }
        return 0;
    }
}
