<?php
use yii\helpers\Html;
/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
foreach ($mostViewlangs as $mostViewlang){                
    echo "<div  style='width: 100%; padding: 5px; margin: 0px; boder: #ADD7F0 1px solid '>";
    echo  Html::a(Html::img($mostViewlang->getImageUrlIcon(), ['class' => 'center-block img-responsive col-lg-5 col-md-5 col-sm-3','alt'=>$mostViewlang->name]),['/languecenter/view','id' => $mostViewlang->ID]);   
       
    echo  "<div class='col-lg-7 col-md-7 col-sm-9'>"
    . "<div class='text-center' style='margin-top: 5px;'>";
    echo Html::a($mostViewlang->name,['languecenter/view','id' => $mostViewlang->ID]);
    echo "</div>
            <div class='rating'><img src='{$mostViewlang->getImageRate()}' alt='Based on {$mostViewlang->rate} reviews.' class='img-responsive center-block'/></div>
        </div>
    </div>";
}?>