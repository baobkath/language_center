<?php

/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

?>
<br><label>Người liên hệ</label> <?= $contact->name;?>
<br><label>Trung tâm:</label> <?= $contact->companyName;?>
<br><label>Email:</label> <?= $contact->email;?>
<br><label>Số điện thoại:</label> <?= $contact->phone;?>
<br><label>Tóm tắt về trung tâm:</label> <?= $contact->decription;?>
<br><label>Địa chỉ trung tâm:</label> <?= $contact->address;?>
<br><label>Thời gian học:</label> <?= $contact->schedule;?>
<br><label>Website:</label> <?= $contact->url;?>

<br><i>Email được gửi tới qua trang web <a href='<?= Yii::$app->params['host'];?>' title='<?= Yii::$app->params['host'];?>'><?= Yii::$app->params['host'];?></a></i>