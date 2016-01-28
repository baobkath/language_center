<?php
namespace frontend\widgets;
/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
use frontend\models\FAdvertise;
use frontend\models\FConfigParam;
use yii\db\Expression;
/**
 * Description of advertise
 *
 * @author HP 6200 Pro
 */
class bannertop extends \yii\bootstrap\Widget{
    public $lan_center;
    public function init() {
        parent::init();
        // uncomment this line to re initial generate slug for all category
		// common\components\initData::genSlugAllCategory();die();
    }
    
    public function run() {
        parent::run();
        $limit_ad = FConfigParam::find()->where(['name' => 'NUMBER_IMAGE_TOP'])->one();
        if($limit_ad){
            $limit = $limit_ad->value;
        }
        else{
            $limit = 3;
        }
        $query = FAdvertise::find()->where(['is_show' => 1,'position'=>'top','type'=>'image','show_in'=>$this->lan_center]);
        $advertise = $query->limit($limit)
            ->all();
        $banner = null;
        if(!$advertise){
            
            $query1 = FAdvertise::find()->where(['is_show' => 1,'position'=>'top','type'=>'image','show_in'=>null]);
            $banner = $query1->one();
            //print_r($banner);
            //die('hello');
        }
        return $this->render('@frontend/views/widgets/bannertop', ['advertises'=>   $advertise,'banner'=>$banner]);
    }
}
