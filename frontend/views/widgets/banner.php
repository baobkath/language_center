<?php
use yii\helpers\Html;

/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
?>
<div class="carousel-inner" role="listbox">
    <?php 
        $d=0;
        
        foreach ($advertises as $advertise){           
            $d++;
            if($d==1){
                
                echo "<div class='item  active'>";
                echo  Html::a(Html::img($advertise->getImageUrl(), ['class' => 'img-responsive','alt'=>$advertise->name]),$advertise->link,['target'=>'_blank']);
                echo      "</div>";
            }
            else{
                
                echo "<div class='item'>";
                echo  Html::a(Html::img($advertise->getImageUrl(), ['class' => 'img-responsive','alt'=>$advertise->name]),$advertise->link,['target'=>'_blank']);
                echo "</div>";
            }
   }?>
</div>
