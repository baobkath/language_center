<?php


/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

?>
<br><label>Người liên hệ</label>Người liên hệ: <?= $contact->name;?>
<br><label>Email:</label> <?= $contact->email;?>
<br><label>Nội dung:</label> <?= $contact->body;?>

<br><i>Email được gửi tới qua trang web <a href='<?= Yii::$app->params['host'];?>' title='<?= Yii::$app->params['host'];?>'><?= Yii::$app->params['host'];?></a></i>