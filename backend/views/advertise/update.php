<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BAdvertise */

$this->title = Yii::t('advertise','Update Advertise: ') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('advertise','Advertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('advertise','Update');
?>
<div class="badvertise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
