<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BContentMagazin */

$this->title = $model->Subject;
$this->params['breadcrumbs'][] = ['label' => Yii::t('magazin', 'Content Magazins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bcontent-magazin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'Day' => $model->Day, 'Level' => $model->Level], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'Day' => $model->Day, 'Level' => $model->Level], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('frontend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Day',
            'Level',
            'Subject',
            
        ],
    ]) ?>
    <p><label>Nội dung</label></p>
    <?= Html::decode($model->Content); ?>
</div>
