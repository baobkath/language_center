<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\assets\AppAsset;
use kartik\rating\StarRating;
use frontend\widgets\banner;
use kartik\growl\Growl;

/* @var $this yii\web\View */
/* @var $model frontend\models\FLanguecenter */
AppAsset::register($this);
$this->title = $model->name;
Yii::$app->params['lan'] = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend','Languecenters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<style type="text/css" scoped="scoped">
    .rating-xs {font-size: 150%}
</style>
<div style='position: relative'>  
    <?= Html::img($model->getImageUrl(), ['class' => 'center-block img-responsive image', 'alt'=>$model->name]);?>
    <div class='center-block' style="width: 10%; position: absolute;  bottom: -5%; left: 42%">
        <?php $form_rate = ActiveForm::begin(['id' => 'rate-form','action' => ['languecenter/rate'],'options' => ['method' => 'post']]); ?>

        <?php echo $form_rate->field($rate, 'value')->widget(StarRating::classname(), [
            'pluginOptions' => [
                'step' => 1,
                'showClear' => false,
                'showCaption' => false,
                'showLabel'=>false,
                'size' => 'xs',
                ],
            'pluginEvents' => [
                'rating.change' => 'function(event, value) {
                    var a= getId();
                    $.ajax({
                    type: "POST",
                    url: "/languecenter/rate",
                    data: { rate: value,idlang: a},
                });}',
                
            ],
        ])->label('');?>
        <?php ActiveForm::end(); ?>
    </div>
    <script>
        function getId(){
            return <?php echo $model->ID;?>;
        }
    </script>
    <?php if(Yii::$app->session->hasFlash('error-rate')): ?>
    <?php    echo Growl::widget([
            'type' => Growl::TYPE_WARNING,
            'title' => Yii::t('frontend','Not rating again!'),
            'icon' => 'glyphicon glyphicon-exclamation-sign',
            'body' => Yii::$app->session->getFlash('error-rate'),
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

    <?php if(Yii::$app->session->hasFlash('success-rate')): ?>
     <?php   echo Growl::widget([
            'type' => Growl::TYPE_SUCCESS,
            'title' => Yii::t('frontend','Rating done!'),
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => Yii::$app->session->getFlash('success-rate'),
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

   
</div>

<div style='clear: both'></div>
<div class="flanguecenter-view">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email',
            'phone',
            'decription',
            'address',
            'schedule',
            [
                'attribute' => 'url',
                'value' => Html::a($model->url, $model->url,['target'=>'_blank']),
                'format' => 'html'
            ],
            //'url:url',
        ],
        'options' =>[
                'class'=>'table table-responsive table-bordered table-hover detail-view',
                'style'=>'width: 100%'
            ],
    ]) ?>

</div>
<div id="myCarousel1" class="row carousel slide" data-ride="carousel" style="margin-bottom: 5px">
    <?= banner::widget(['lan_center'=>Yii::$app->params['lan']]) ?>
</div>
<div class='row map'>
    
    <?php
    echo
    "<input type='text' name='adress' value='{$model->address}' id='address' style='display: none'>".
    "<input type='text' name='name' value='{$model->name}' id='namett' style='display: none'>";
    ?>
    <div id="map" style="width: 100%; height: 300px;"></div>
    <script>
        
        function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: {lat: 21.040113, lng: 105.811429}
          });
          var geocoder = new google.maps.Geocoder();
          geocodeAddress(geocoder, map);
          
        }
        
        function geocodeAddress(geocoder, resultsMap) {
          var address = document.getElementById('address').value; 
          var name = document.getElementById('namett').value;
          geocoder.geocode({'address': address}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
               
              resultsMap.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
              });
              
              var infowindow = new google.maps.InfoWindow({
                content: "<b>"+name+"</b><br>"+address
                });

              infowindow.open(resultsMap,marker);
              google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(resultsMap,marker);
                });
            } else {
              alert('Geocode was not successful for the following reason: ' + status);
            }
          });
        }
        
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?= Yii::$app->params['API_KEY_MAP'];?>&amp;signed_in=true&amp;callback=initMap"
        async defer></script>
    
</div>
<?php  if($model->active): ?>
<div class='row' style='border: #CCC solid 1px; text-align: center'>
        <div class='col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1'>
            <div class='center-block' style='border-bottom: #DDD solid 1px; width: 70%; margin-bottom: 25px'>
                <h2 class="text-center"><?= Html::encode(Yii::t('frontend','Contact Center')) ?></h2>
            </div>
            <div class="col-lg-12">
                <h3></h3>
            <?php if(Yii::$app->session->hasFlash('error-email')): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= Yii::$app->session->getFlash('error-email') ?>
                </div>
            <?php endif; ?>
            </div>
            <div class="col-lg-12">
            <?php if(Yii::$app->session->hasFlash('success-email')): ?>
                <div class="alert alert-info text-center" role="alert">
                    <?= Yii::$app->session->getFlash('success-email') ?>
                </div>
            <?php endif; ?>
            </div>
        <?php $form = ActiveForm::begin(['id' => 'contact-form',
             'options' => ['class' => 'form-horizontal']]); ?>
    
 
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form->field($contact, 'name',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your name'),
            ]])->textInput() ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form->field($contact, 'email',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your email'),
            ]])->input('email') ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form->field($contact, 'subject',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Subject'),
            ]]) ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form->field($contact, 'body',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Body'),
            ]])->textArea(['rows' => 9]) ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form->field($contact, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-7">{input}</div></div>',
            ]) ?>

            <div class="form-group" style='margin-top: -15px'>
                <?= Html::submitButton(Yii::t('frontend','Submit'), ['class' => 'btn btn-primary col-md-8 col-md-offset-2', 'name' => 'contact-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        </div>
    
</div>
<?php endif;?>
<div class='row' style='border:#DDD solid 1px;'>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php if(Yii::$app->language == 'vi'){ echo 'vi_VN';}else{echo Yii::$app->language;} ?>/sdk.js#xfbml=1&version=v2.5&appId=402158776647106";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php echo
"<div class='fb-share-button' data-href='";?><?= Yii::$app->params['host']."/languecenter/view?id={$model->ID}' data-layout='button'></div>
<div class='fb-like' style='margin-left: 5px;'></div>

<div class='fb-comments' data-href='";?><?= Yii::$app->params['host']."/languecenter/view?id={$model->ID}' data-width='100%' data-numposts='5'></div>";
?>
</div>
