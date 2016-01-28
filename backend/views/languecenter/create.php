<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BLanguecenter */

$this->title = yii::t('languecenter','Create Language\'s Center');
$this->params['breadcrumbs'][] = ['label' => yii::t('languecenter','Language \'s Centers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blanguecenter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
