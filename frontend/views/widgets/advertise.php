<?php
use yii\helpers\Html;
/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */
?>
<?php foreach ($advetises as $advertise): ?>
 <?php  if($advertise->type == 'image'){
  echo  Html::a(Html::img($advertise->getImageUrl(), ['class' => 'center-block img-responsive','alt'=>$advertise->name]),$advertise->link,['target'=>'_blank', 'onclick'=> "add_click({$advertise->id})"]);
 }else{
    echo $advertise->body;
}
?>
<script>
function add_click(id){
        
            $.ajax({
            type: "POST",
            url: ["/advertise/click"],
            data: { ad: id},
        });
    }
</script>
<?php endforeach;?>
