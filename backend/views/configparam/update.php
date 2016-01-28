<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BConfigParam */

$this->title = yii::t('backend','Update Bconfig Param: ') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bconfig Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = yii::t('backend','Update');
?>
<div class="bconfig-param-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
