<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BMagazin */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('magazin', 'Magazins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bmagazin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a(Yii::t('frontend', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'email:email',
            'level',
            'create_at',
        ],
    ]) ?>

</div>
