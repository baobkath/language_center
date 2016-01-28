<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
//use kartik\widgets\StarRating;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LanguecenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend','Homepage');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='box-product' style='overflow: auto;'>
<?php

foreach ($models as $mod){
    
    echo 

    "
    <div class='row box-center' style='position: relative;'>
        <div class='col-md-3 col-sm-4'>";
            echo  Html::a(Html::img($mod->getImageUrlIcon(), ['class' => 'center-block img-responsive','alt'=>$mod->name]),['/languecenter/view','id' => $mod->ID]);
            
            echo "<div class='rating'><div><img src='{$mod->getImageRate()}' alt='Based on 0 reviews.' class='img-responsive center-block' /></div></div>
        </div>
        <div class='col-md-9 col-sm-8'>
            <div  class='name'>";
        echo Html::a($mod->name,['languecenter/view','id' => $mod->ID]);
        echo "</div>"
        . "<div class='description'>{$mod->decription}</div>         
        </div>
        <div class='row more'>";
        echo Html::a(Yii::t('frontend','more...'),['languecenter/view','id' => $mod->ID,'slug'=> $mod->slug]);
        echo "</div>
    </div>";
    }?>
</div>
<div class='pagination-sm pull-right'>
    <?= LinkPager::widget([
        'pagination' => $pagination,
        
    ]);?>
</div>
<div style="clear: both"></div>