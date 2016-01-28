<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BConfigParam */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => yii::t('backend','Params'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bconfig-param-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(yii::t('backend','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'value',
            'description:ntext',
            'status',
        ],
    ]) ?>

</div>
