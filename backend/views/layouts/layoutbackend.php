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
        'brandLabel' => Yii::t('backend','Magin Gam'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('backend','Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('User','User'), 
            'items' => [
                ['label' => Yii::t('backend','List user'), 'url' => ['/user/admin/index']],
                ['label' => Yii::t('backend','Create user'), 'url' =>['/user/admin/create']],
                ['label' => Yii::t('backend','List roles'), 'url' =>['/rbac/role/index']],
                ['label' => Yii::t('backend','Create roles'), 'url' =>['/rbac/role/create']],
                ['label' => Yii::t('backend','List permission'), 'url' =>['/rbac/permission/index']],
                ['label' => Yii::t('backend','Create permission'), 'url' =>['/rbac/permission/create']],
            ],
        ],
        ['label' => Yii::t('languecenter','Language Center'),
            'items' => [
                ['label' => yii::t('languecenter','Language \'s Centers'), 'url' => ['/languecenter/index']],
                ['label' => yii::t('languecenter','Create Language\'s Center'), 'url' =>['/languecenter/create']],
            ],
        ],
        ['label' => Yii::t('backend','Param'),
            'items' => [
                ['label' => yii::t('backend','List params'), 'url' => ['/configparam/index']],                
            ],
        ],
        ['label' => Yii::t('advertise','Advertise'), 'url' => ['/advertise/index']],
    ];
    if (\Yii::$app->user->can('manage_magazin')) {
        $menuItems[] = ['label' => Yii::t('backend','Magazin'),
            'items' => [
                ['label' => Yii::t('magazin','List magazin'), 'url' => ['/magazin/index']],
                ['label' => Yii::t('magazin','List content magazin'), 'url' =>['/contentmagazin/index']],
                ['label' => Yii::t('magazin','Create content Magazin'), 'url' =>['/contentmagazin/create']],
            ],
        ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('backend','Login'), 'url' => ['/user/security/login']];
    } else {
        $menuItems[] = [
            'label' => Yii::t('backend','Logout (') . Yii::$app->user->identity->username . ')',
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
