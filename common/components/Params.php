<?php

namespace common\components;

use Yii;
use common\models\ConfigParam;

class Params {

    public function __contruct(){
    }

    public static function initParams(){
        $arParam = Yii::$app->cache->get('config_params');
        if(!$arParam){
            $arParam = ConfigParam::find()->where(['status' => ConfigParam::ACTIVE])->all();
            Yii::$app->cache->set('', $arParam, 86400);// cached for a day in second
        }
        return $arParam;
    }

    public static function getParam($param_name){
        $arParam = self::initParams();
        foreach($arParam as $param){
            if($param['name'] == $param_name){
                return $param['value'];
            }
        }
        return false;
    }
}
