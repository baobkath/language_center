<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BContentMagazin */

$this->title = Yii::t('magazin', 'Create content Magazin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('magazin', 'Content Magazins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcontent-magazin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
