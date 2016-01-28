<?php
namespace frontend\widgets;

use frontend\models\FMagazin;
/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

class magazin extends \yii\bootstrap\Widget{
    public function init() {
        parent::init();
        // uncomment this line to re initial generate slug for all category
		// common\components\initData::genSlugAllCategory();die();
    }
    
    public function run() {
        parent::run();
        $magazin = new FMagazin;
        return $this->render('@frontend/views/widgets/magazin', ['magazin'=> $magazin]);
    }
}