<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title =  Html::encode(Yii::t('frontend','Contact us'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    

    <div class="row">
        <div class='col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1'>
        <div class='center-block' style='border-bottom: #DDD solid 1px; width: 70%; margin-bottom: 25px'>
            <h1 class="text-center"><?= Html::encode(Yii::t('frontend','Contact us')) ?></h1>
            <p class="text-center">
                <?= Yii::t('frontend','If you want to up your info\'s center, please fill out the following form to contact us. Thank you.');?>
            </p>
        </div>
        <div class="col-lg-12">
        <?php if(Yii::$app->session->hasFlash('error-magin-email')): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= Yii::$app->session->getFlash('error-magin-email') ?>
            </div>
        <?php endif; ?>
        </div>
        <div class="col-lg-12">
        <?php if(Yii::$app->session->hasFlash('success-magin-email')): ?>
            <div class="alert alert-info text-center" role="alert">
                <?= Yii::$app->session->getFlash('success-magin-email') ?>
            </div>
        <?php endif; ?>
        </div>
        <?php $form_magin = ActiveForm::begin(['id' => 'contact-magin-form',
             'options' => ['class' => 'form-horizontal']]); ?>
    
 
        <div class='col-md-6' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'name',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your name'),
            ]])->textInput() ?>
        </div>
        <div class='col-md-6' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'companyName',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your company'),
            ]])->textInput() ?>
        </div>
        <div class='col-md-6' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'phone',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your phone'),
            ]])->textInput() ?>
        </div>
        <div class='col-md-6' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'email',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your email'),
            ]])->input('email') ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'address',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your address'),
            ]]) ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'schedule',['inputOptions' => [
                'placeholder' => Yii::t('languecenter','Schedule'),
            ]]) ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'url',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Website'),
            ]]) ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'decription',['inputOptions' => [
                'placeholder' => Yii::t('languecenter','Decription'),
            ]])->textArea(['rows' => 4]) ?>
        </div>
        <div class='col-md-12' style='margin-top: -25px'>
            <?= $form_magin->field($contactmagin, 'verifyCode')->widget(Captcha::className(), [

                'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-7">{input}</div></div>',
            ]) ?>

            <div class="form-group" style='margin-top: -15px'>
                <?= Html::submitButton(Yii::t('frontend','Submit'), ['class' => 'btn btn-primary col-md-8 col-md-offset-2', 'name' => 'contact-magin-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
