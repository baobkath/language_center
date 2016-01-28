<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BAdvertise */

$this->title =  Yii::t('advertise','Create Advertise');
$this->params['breadcrumbs'][] = ['label' =>  Yii::t('advertise','Advertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="badvertise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formlang', [
        'model' => $model,
    ]) ?>

</div>
