<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BContentMagazin */

$this->title = Yii::t('magazin', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('magazin','content Magazin'),
]) . ' ' . $model->Day;
$this->params['breadcrumbs'][] = ['label' => Yii::t('magazin', 'Content Magazins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Day, 'url' => ['view', 'Day' => $model->Day, 'Level' => $model->Level]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="bcontent-magazin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
