<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\mostView;
use frontend\widgets\advertise;
use frontend\widgets\bannertop;
use frontend\widgets\magazin;
use kartik\growl\Growl;
/* @var $lan type */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trang web liệt kê danh sách các trung tâm dào tạo tiếng nhật cơ bản và nâng cao ở Hà Nội, ">
    <meta name="keywords" content="Tiếng nhật,Trung tâm,Danh sách,Danh sách trung tâm, trung tâm tiêng nhật">
    <meta property="fb:admins" content="{baobkath@gmail.com}"/>
    <?= Html::csrfMetaTags() ?>
    <meta name="google-site-verification" content="ITjvEDtfCF0k1R4W02QaZsLc9ePplu2pfcBgz6zcIkU" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-70908835-1', 'auto');
        ga('send', 'pageview');

    </script>
    <style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 100%;
        margin: auto;
    }
    </style>
    <style type="text/css">
    #goTop {
        bottom: 5px;
        cursor: pointer;
        display: none;
        position: fixed;
        right: 10%;
        width: 1%;
        z-index: 1000;
    }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?= bannertop::widget(['lan_center'=>Yii::$app->params['lan']]) ?>
    </div>
    <div style="clear: both"></div>
    
    <div class="container">
        <div class=" col-lg-9 col-md-9 sidebar-a">
            <?= $content ?>
            
        </div>
        <div class=" col-lg-3 col-md-3 ">
            <div id="advertise" style="margin-top: 20px;display: block">
                <?= advertise::widget(['lan_center'=>Yii::$app->params['lan']]) ?>
            </div>
            <div id="advertise1" style="margin-top: 20px; display: none">
                <?= advertise::widget(['lan_center'=>Yii::$app->params['lan']]) ?>
            </div>
            <script type="text/javascript">
                
                
                $(function(){
                $(window).scroll(function () {
                    //var height = document.getElementById("myCarousel").style.height;
                    var width = screen.width;
                if (($(this).scrollTop() > 285)&&(width > 992)&&($( document ).width()>992)){ document.getElementById("advertise").style.position = 'fixed';
                    document.getElementById("advertise").style.top = '0px';
                    document.getElementById("advertise").style.width = '19%';
                    document.getElementById("advertise").style.zIndex = '9999';
                    document.getElementById("advertise").style.marginTop = '0px';
                    document.getElementById("advertise1").style.display = 'block';
                    document.getElementById("mostview").style.marginTop = document.getElementById("advertise").style.height;
                    //alert(width);
                    
                }else{
                    document.getElementById("advertise").style.position = 'static';
                    document.getElementById("advertise").style.width = '100%';
                    document.getElementById("advertise").style.marginTop = '20px';
                    document.getElementById("mostview").style.marginTop = '10px';
                    document.getElementById("advertise1").style.display = 'none';
                }});
          
                });
            </script>
            <div class="box" id="mostview">
                <div style='margin-top: 20px; height: 30px; font-size: 20px; color: #ff0084; border-bottom: #245580 solid 2px'><?= YII::t('frontend','Popular');?></div>
                <div class='box-product' style='margin: 0' >
                    <?= mostView::widget() ?>
                </div>
            </div>
            <div id="box-show">
                <div class='title'><?= Yii::t('frontend','Get exercise free');?> <a><span onclick="hideBox()" class="glyphicon glyphicon-chevron-down pull-right" style="margin-top: 4px"  aria-hidden="true"></span></a></div>
                <div style="padding: 20px">
                    <?= magazin::widget() ?>
                </div>
            </div>
            <div id="box-hide">
                <div class="title"><?= Yii::t('frontend','Get exercise free');?> <a><span onclick="showBox()" class="glyphicon glyphicon-chevron-up pull-right" style="margin-top: 4px" aria-hidden="true"></span></a></div>
                
            </div>
        </div>
        
    </div>
    <?php if(Yii::$app->session->hasFlash('error-magazin')): ?>
    <?php    echo Growl::widget([
            'type' => Growl::TYPE_WARNING,
            'title' => Yii::t('frontend','Sorry!'),
            'icon' => 'glyphicon glyphicon-exclamation-sign',
            'body' => Yii::$app->session->getFlash('error-magazin'),
            'showSeparator' => false,
            'delay' => 3000,
            'pluginOptions' => [
                'showProgressbar' => false,
                'placement' => [
                    'from' => 'bottom',
                    'align' => 'left',
                ]
            ]
]);?>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('success-magazin')): ?>
     <?php   echo Growl::widget([
            'type' => Growl::TYPE_SUCCESS,
            'title' => Yii::t('frontend','Sent mail done!'),
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => Yii::$app->session->getFlash('success-magazin'),
            'showSeparator' => false,
            'delay' => 3000,
            'pluginOptions' => [
                'showProgressbar' => false,
                'placement' => [
                    'from' => 'bottom',
                    'align' => 'left',
                ]
            ]
    ]);?>
    <?php endif; ?>
    <div id="goTop">
        <img src="<?= Yii::$app->urlManager->baseUrl.'/images/top.png';?>" alt='<?= Yii::t('frontend','Top')?>' title="<?= Yii::t('frontend','Top')?>" />
    </div>
    <script>
        function showBox(){
            document.getElementById("box-show").style.display = 'block';
            document.getElementById("box-hide").style.display = 'none';
        }
        function hideBox(){
            document.getElementById("box-show").style.display = 'none';
            document.getElementById("box-hide").style.display = 'block';
        }
    </script>
    
<script type="text/javascript">
    $(function(){
    $(window).scroll(function () {
    if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
    else $('#goTop').fadeOut();
    });
    $('#goTop').click(function () {
    $('body,html').animate({scrollTop: 0}, 'slow');
    });
    });
</script>
    <footer class="footer">
        <div class="container row text-center">
            
            
            <?= html::a(yii::t('frontend','Home'),['site/index'],['title'=>yii::t('frontend','Home')])?>
            <?= html::a(yii::t('frontend','Contact us'),['site/contact'],['title'=>yii::t('frontend','Contact us')])?>
            <br>
            <?= yii::t('frontend','Copyright © 2015 by')?> <a href="http://magingam.vn" title="Magin Gam" target='_blank'>Magin Gam</a>
            
        </div>
    </footer>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
