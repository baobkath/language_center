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
class banner extends \yii\bootstrap\Widget{
    public $lan_center;
    public function init() {
        parent::init();
        // uncomment this line to re initial generate slug for all category
		// common\components\initData::genSlugAllCategory();die();
    }
    
    public function run() {
        parent::run();
        $limit_ad = FConfigParam::find()->where(['name' => 'NUMBER_AD_IN_BODY'])->one();
        if($limit_ad){
            $limit = $limit_ad->value;
        }
        else{
            $limit = 3;
        }
        $query = FAdvertise::find()->where(['is_show' => 1,'position'=>'body','show_in'=>$this->lan_center])
                ->andwhere(['<=', 'start_at', new Expression('NOW()')])
                ->andwhere(['>=', 'end_at', new Expression('NOW()')]);
        $advertise = $query->limit($limit)
            ->all();
        return $this->render('@frontend/views/widgets/banner', ['advertises'=>   $advertise]);
    }
}
