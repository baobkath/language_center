<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\checkbox\CheckboxX;
use kartik\growl\Growl;

$this->title = Yii::t('backend','Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('backend', 'Please fill out the following fields to login:');?></p>
    <?php if(Yii::$app->session->hasFlash('error-rate')): ?>
    <?php    echo Growl::widget([
            'type' => Growl::TYPE_WARNING,
            'title' => 'Not login!',
            'icon' => 'glyphicon glyphicon-exclamation-sign',
            'body' => Yii::$app->session->getFlash('error-login'),
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
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'login') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe',[
                    'template' => '{input}{label}{error}{hint}',
                    'labelOptions' => ['class' => 'cbx-label'],
                    
                ])->widget(CheckboxX::classname(), ['autoLabel'=>false,
                    'pluginOptions' => [
                        'threeState' => false,
                        'size' => 'md',
                    ]]); ?>

                <div class="form-group">
                    <?= Html::submitButton(YII::t('backend','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
