<?php
namespace frontend\widgets;
/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
use frontend\models\FLanguecenter;
use frontend\models\FConfigParam;
/**
 * Description of mostView
 *
 * @author HP 6200 Pro
 */
class mostView extends \yii\bootstrap\Widget{
    public function init() {
        parent::init();
        // uncomment this line to re initial generate slug for all category
		// common\components\initData::genSlugAllCategory();die();
    }
    
    public function run() {
        parent::run();
        $limit_Lang_most = FConfigParam::find()->where(['name' => 'NUMBER_LANGUE_IN_MOST'])->one();
        if($limit_Lang_most){
            $limit = $limit_Lang_most->value;
        }
        else{
            $limit = 10;
        }
        $query = FLanguecenter::find()->where(['is_show' => 1])->orderBy('number DESC');
        $mostViewlangs = $query->limit($limit)
            ->all();
        return $this->render('@frontend/views/widgets/mostView', ['mostViewlangs'=>   $mostViewlangs]);
    }
}
