<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchLanguecenter */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = yii::t('backend','Language\'s Centers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blanguecenter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if (\Yii::$app->user->can('manage-languagecenter')){
        echo Html::a(yii::t('backend','Create Language\'s Center'), ['create'], ['class' => 'btn btn-success']);
                
        } ?>
    </p>

    <?php
        if (\Yii::$app->user->can('manage-languagecenter')){
            $action = '{view}{update}{delete}';
        }
        else{
            $action = '{view}';
        }
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\ActionColumn',
                    'template'=>$action,                                         
                ],
                ['class' => 'yii\grid\SerialColumn'],                
                'name',
                'email',
                'phone',
                [
                    'attribute' => 'icon',
                    'format' => 'html',
                    'value' => function($dataProvider) {
                    return Html::img($dataProvider->getImageUrlIcon(),['width'=>40]);},
                    'contentOptions' => ['class' => 'center-block'],

                ],
                
                'decription',
                            [
                    'attribute' => 'image',
                    'format' => 'html',
                    'value' => function($dataProvider) {
                    return Html::img($dataProvider->getImageUrl(),['width'=>90]);},
                    'contentOptions' => ['class' => 'center-block'],

                ],
                'address',
                'schedule',
                'url:url',
                'is_show',
                'rate',
                'number',
                'ordinal_view',
                
            ],
        ]); 
    ?>

</div>
