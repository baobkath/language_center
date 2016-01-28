<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LanguecenterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flanguecenter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'decription') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'open_at') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'ordinal_view') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('frontend','Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('frontend','Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
