<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BLanguecenter */

$this->title = yii::t('backend','Update Language\'s Center: ') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => yii::t('backend','Language\'s Centers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = yii::t('backend','Update');
?>
<div class="blanguecenter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
