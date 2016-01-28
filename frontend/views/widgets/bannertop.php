<?php
use yii\helpers\Html;
?>
<ol class="carousel-indicators">
   <?php 
   $d=0;
   foreach ($advertises as $advertise){
        $d++;
        if($d==1){
            echo "<li data-target='#myCarousel' data-slide-to='{$advertise->id}'  class='active' ></li>";
        }
        else{
            echo "<li data-target='#myCarousel' data-slide-to='{$advertise->id}'></li>";
        }
   }?>
</ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    <?php 
        $d=0;
        
        foreach ($advertises as $advertise){           
            $d++;
            if($d==1){
                
                echo "<div class='item  active'>
                        <img src='{$advertise->getImageUrl()}' alt='{$advertise->name}' width='460' height='400'>                        
                      </div>";
            }
            else{
                
                echo "<div class='item'>
                        <img src='{$advertise->getImageUrl()}' alt='{$advertise->name}' width='460' height='300'>
                        
                      </div>";
            }
            
        }
        if($d>1){
                 echo '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
        </a>';}
   ?>
    <?php if($banner): ?>
    <?php 
        echo "<div class='item active'>
            <img src='{$banner->getImageUrl()}' alt='{$banner->name}' width='460' height='300'>

        </div>";
    ?>
    <?php endif; ?>   
      <!-- Left and right controls -->
    
   
    </div>

   

