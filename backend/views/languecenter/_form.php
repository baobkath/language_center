<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;


/* @var $this yii\web\View */
/* @var $model backend\models\BLanguecenter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blanguecenter-form">

    <?php $form = ActiveForm::begin([
            
            'options' => ['enctype'=>'multipart/form-data']
        ]); ?>
    <div class='row'>
        <div class='row'>
            <div class='col-md-6 center-block'>
                <?php
                $title = isset($model->name) && !empty($model->name) ? $model->name : 'Language\'s Center';
                echo Html::img($model->getImageUrlIcon(), [
                    'class'=>'img-thumbnail', 
                    'alt'=>$title, 
                    'title'=>$title
                ]);
                ?>
                <?= $form->field($model, 'img_icon')->widget(FileInput::classname(), [
                    'name' => 'icon-center',
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' =>  'Select icon'
                    ],
                    'options' => ['accept' => 'image/*']
                ]) ?>
            </div>
            <div class='col-md-6 center-block'>
                <?php
                $title = isset($model->name) && !empty($model->name) ? $model->name : 'Language\'s Center';
                echo Html::img($model->getImageUrl(), [
                    'class'=>'img-thumbnail', 
                    'alt'=>$title, 
                    'title'=>$title
                ]);
                ?>
                <?= $form->field($model, 'img')->widget(FileInput::classname(), [
                    'name' => 'image-center',
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' =>  'Select Photo'
                    ],
                    'options' => ['accept' => 'image/*']
                ]) ?>
            </div>
        </div>
        <div class='col-md-12'>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->input('email') ?>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'decription')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'schedule')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'is_show')->widget(CheckboxX::classname(), [
                        'autoLabel'=>false,
                        'pluginOptions' => [
                            'threeState' => false,
                            'size' => 'md',
                        ]
                    ]); ?>
            <?= $form->field($model, 'active')->widget(CheckboxX::classname(), [
                        'autoLabel'=>false,
                        'pluginOptions' => [
                            'threeState' => false,
                            'size' => 'md',
                        ]
                    ]); ?>
            <?= $form->field($model, 'ordinal_view')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? yii::t('languecenter','Create') : yii::t('languecenter','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        
    </div>
    <?php ActiveForm::end(); ?>

</div>
