<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = yii::t('backend','Homepage');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('backend','Welcome');?></h1>

        <p class="lead"><?= Yii::t('backend','You signed in us system administrator');?></p>

       
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3 text-center">
                <h2><?= Yii::t('backend','User');?></h2>

                <p></p>

                <p><?= Html::a(Yii::t('backend','Manage User'), ['user/admin/index'], ['class' => 'btn btn-success']) ;?></p>
            </div>
            <div class="col-lg-3 text-center">
                <h2><?= Yii::t('backend','Centers');?></h2>

                <p></p>

                <p><?= Html::a(Yii::t('backend','Manage Center'), ['languecenter/index'], ['class' => 'btn btn-success']) ;?></p>
            </div>
            <div class="col-lg-3 text-center">
                <h2><?= Yii::t('backend','Params');?></h2>

                <p></p>

                <p><?= Html::a(Yii::t('backend','Manage Param'), ['configparam/index'], ['class' => 'btn btn-success']) ;?></p>
            </div>
            <div class="col-lg-3 text-center">
                <h2><?= Yii::t('backend','Advertise');?></h2>

                <p></p>

                <p><?= Html::a(Yii::t('backend','Manage Advertise'), ['advertise/index'], ['class' => 'btn btn-success']) ;?></p>
            </div>
        </div>

    </div>
</div>
