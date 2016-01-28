<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\BContentMagazin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bcontent-magazin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Day')->input('number',['min'=>0]) ?>

    <?= $form->field($model, 'Level')->dropDownList(['N0' => yii::t('frontend','Begin study'), 'N5' => 'N5', 'N4' => 'N4', 'N3' => 'N3', 'N2' => 'N2', 'N1' => 'N1'])->label(''); ?>

    <?= $form->field($model, 'Subject')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'Content')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full'
            ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('magazin', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
