<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model backend\models\BAdvertise */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => yii::t('advertise','Advertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="badvertise-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class='row'>
        <div class='center-block'>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    [
                        'attribute'=>'image',
                        'value'=>$model->getImageUrl(),
                        'format' => ['image',['height'=>'200']],
                    ],
                    'start_at',
                    'end_at',
                    'link:url',
                    'type',
                    'position'
                ],
            ]) ?>
            <label class="cbx-label" for="s_2">Is Show:</label>
                <?= CheckboxX::widget([
                    'model' => $model,
                    'attribute' => 'is_show',
                    'readonly'=>true, 
                    'pluginOptions' => [
                        'threeState' => false,
                        'size' => 'md',
                    ]
                ]); ?>
            <p>
                <br>
            <?php
            if (\Yii::$app->user->can('manage-advertise')) {
                echo Html::a(Yii::t('advertise','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); 
                echo Html::a(Yii::t('backend','Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
            ]);} ?>
            </p>
        </div>
    </div>
    

</div>
