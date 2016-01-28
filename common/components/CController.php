<?php
namespace common\components;
/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
use Yii;
use yii\web\Controller as YiiController;
/**
 * Description of CController
 *
 * @author HP 6200 Pro
 */
class CController extends YiiController{
    //put your code here
    function init() {
        
        if(Yii::$app->getRequest()->getCookies()->has('language')){
            Yii::$app->language = Yii::$app->getRequest()->getCookies()->getValue('language');
            //die(Yii::$app->language);
        }
        parent::init();
    }
}
