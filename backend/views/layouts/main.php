<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => YII::t('backend','Magin Gam'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => YII::t('backend','Home'), 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => YII::t('backend','Login'), 'url' => ['/user/security/login']];
    } else {
        $menuItems[] = [
            'label' => YII::t('backend','Logout (') . Yii::$app->user->identity->username . ')',
            'url' => ['/user/security/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


<footer class="footer">
        <div class="container row text-center">
            
            <div id="vi" onclick="loadLangue('vi')" class='pull-left' style="margin-left: 1%; margin-right: 2px">
                <img src="<?= Yii::$app->urlManager->baseUrl.'/uploads/Flag_Vietnam.png';?>" alt='<?= Yii::t('frontend','Vietnamise')?>' title="<?= Yii::t('frontend','Vietnamise')?>" />
            </div>
            <div id="en-US" onclick="loadLangue('en-US')" class='pull-left' style="margin-right: 5px">
                <img src="<?= Yii::$app->urlManager->baseUrl.'/uploads/Flag_England.png';?>" alt='<?= Yii::t('frontend','English')?>' title="<?= Yii::t('frontend','English')?>" />
            </div>
            <?= html::a(yii::t('frontend','Home'),['site/index'],['alt'=>yii::t('frontend','Home'),'title'=>yii::t('frontend','Home'),'class'=>'pull-left'])?>
            <?= yii::t('frontend','Copyright © 2015 by')?> <a href="http://magingam.vn" alt="Magin Gam" title="Magin Gam" target='_blank'>Magin Gam</a>
            </div>
            
        </div>
    </footer>
</div>
<script>
    function loadLangue(lang){
        $.ajax({
            type: "POST",
            url: ["/site/language"],
            data: { langue: lang},
        });
    }
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
