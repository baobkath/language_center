<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SearchContenMagazin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcontent-magazin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Day') ?>

    <?= $form->field($model, 'Level') ?>

    <?= $form->field($model, 'Subject') ?>

    <?= $form->field($model, 'Content') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('magazin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('magazin', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
