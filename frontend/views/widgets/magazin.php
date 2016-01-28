<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/* 
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

?>
<div class='row'>
<?php $form = ActiveForm::begin([
            'id' => 'magazin-form',
            'options' => ['enctype' => 'multipart/form-data','class' => 'form-horizontal'],
            'action' => ['magazin/registermagain'],
            'method' => 'post',
           ]); ?>
    
 
        <div class='col-md-12' style="margin-top: -40px;">
            <?= $form->field($magazin, 'name',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your name'),'class'=>'form-control',
            ]])->textInput()->label('') ?>
        </div>
    <div class='col-md-12' style="margin-top:-40px;">
            <?= $form->field($magazin, 'email',['inputOptions' => [
                'placeholder' => Yii::t('frontend','Your email'),'class'=>'form-control',
            ]])->input('email')->label('') ?>
        </div>
        <div class='col-md-12' style="margin-top:-40px;">
            
            <?= $form->field($magazin, 'level')->dropDownList(['N0' => yii::t('frontend','Begin study'), 'N5' => 'N5', 'N4' => 'N4', 'N3' => 'N3', 'N2' => 'N2', 'N1' => 'N1'])->label(''); ?>
        </div>
        <div class='col-md-12' style="margin-top:-40px;">
            <?= $form->field($magazin, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row" ><div class="col-md-5" >{image}</div><div class="col-md-7">{input}</div></div>',
                
            ]) ?>
        </div>
        <div class='col-md-12' style="margin-top:-20px;">
            <?= Html::submitButton(Yii::t('frontend','Submit'), ['class' => 'btn btn-primary col-md-8 col-md-offset-2 col-xs-6 col-xs-offset-3 ', 'name' => 'contact-button']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
</div>