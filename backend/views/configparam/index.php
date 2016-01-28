<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchParam */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = yii::t('backend','Params');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bconfig-param-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'value',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template'=> '{view}{update}'
            ],
        ],
    ]); ?>

</div>
