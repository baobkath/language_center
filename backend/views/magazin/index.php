<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchMagazin */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('magazin', 'Magazins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bmagazin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'email:email',
            'level',
            'create_at',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{delete}',
            ],
        ],
    ]); ?>
    <div class='pull-right'><?= html::a( html::tag('span', '',['class'=>'glyphicon glyphicon-print']),['magazin/export'],['title'=>'Export excel']);?>
    </div>

</div>
