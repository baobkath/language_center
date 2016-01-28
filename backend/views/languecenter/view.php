<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BLanguecenter */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => yii::t('backend','Language\'s Centers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blanguecenter-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class='row'>
        <div class='col-md-12'>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'email',
                    'phone',
                    'decription',
                    [
                        'attribute'=>'icon',
                        'value'=>$model->getImageUrlIcon(),
                        'format' => ['image',['height'=>'150']],
                    ],
                    [
                        'attribute'=>'image',
                        'value'=>$model->getImageUrl(),
                        'format' => ['image',['height'=>'200']],
                    ],
                    'address',
                    'schedule',
                    'url:url',
                    'rate',
                    'active',
                    'is_show'
                ],
            ]) ?>
            
            <p>
                <br>
                <?= Html::a(yii::t('backend','Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(yii::t('backend','Delete'), ['delete', 'id' => $model->ID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <?= Html::a(Yii::t('advertise','Create Advertise'), ['/advertise/add','id'=>$model->ID], ['class' => 'btn btn-success']) ;?>
        </div>
    </div>
    

    

</div>
