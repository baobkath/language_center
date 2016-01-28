<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchAdvertise */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('advertise','Advertises');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="badvertise-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php 
        if (\Yii::$app->user->can('manage-advertise')){
        echo Html::a(Yii::t('advertise','Create Advertise'), ['create'], ['class' => 'btn btn-success']) ;}?>
    </p>

    <?php 
    if (\Yii::$app->user->can('manage-advertise')){
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
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($dataProvider) {
                return Html::img($dataProvider->getImageUrl(),['width'=>100]);},
                'contentOptions' => ['class' => 'center-block'],
                
            ],
            'start_at:datetime',
            'end_at:datetime',
            'is_show'=>[                
                'class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function ($model) {
                    return ['checked' => $model->is_show,];
                },               
            ],
            'link:url',
            'type',
            'position',
                        'show_in',

            
        ],
    ]); ?>

</div>
