<?php
use yii\helpers\Html;

/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

?>

<div style="background: #000080; min-height: 50px; margin: 0px; color: #FFF; padding: 7px 5px 1px 10px">
    <p>Cảm ơn bạn <?= $magazin->name;?> đã đăng ký nhận bài tập với trình độ <?= $magazin->level;?></p>
    <p>Dưới bài tập buổi <?= $contentmagazin->Day;?> của bạn:</p>
</div>
<div style="border: #003eff solid 1px; padding: 5px">
    <?= Html::decode($contentmagazin->Content); ?>
</div>
<div style=" padding: 0px 0px 5px 10px; background: #ff6b7f; color: #fff; text-align: center">
    <br><i>Email được gửi tới từ trang web <a href='<?= Yii::$app->params['host'];?>' title='<?= Yii::$app->params['host'];?>'><?= Yii::$app->params['host'];?></a></i>
</div>
