<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use dosamigos\ckeditor\CKEditor;
use backend\models\BLanguecenter;

/* @var $this yii\web\View */
/* @var $model backend\models\BAdvertise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="badvertise-form">

    <?php $form = ActiveForm::begin([
            
            'options' => ['enctype'=>'multipart/form-data']
        ]); ?>
    <div class='row'>
        <div class='col-md-3'>
            <label>Update Banner Top</label>
            <ul>
                <li>Type: image</li>
                <li>Position: top</li>
                <li>Size image: 1024x200</li>
            </ul>
            <label>Update Banner Body</label>
            <ul>
                <li>Type: image/flash/html</li>
                <li>Position: body</li>
                <li>Size image: 1024x100</li>
            </ul>
            <label>Update Advertise</label>
            <ul>
                <li>Type: image/flash/html</li>
                <li>Position: right</li>
                <li>Size: 400x350</li>
            </ul>
        </div>
        <div class='col-md-8 center-block '>
            <?php
            $title = isset($model->name) && !empty($model->name) ? $model->name : 'Advertise';
            echo Html::img($model->getImageUrl(), [
                'class'=>'img-thumbnail center-block', 
                'alt'=>$title, 
                'title'=>$title
            ]);
            ?>
            <?= $form->field($model, 'img')->widget(FileInput::classname(), [
                'name' => 'image-member',
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  yii::t('advertise','Select Photo')
                ],
                'options' => ['accept' => 'image/*']
            ]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'start_at')->widget(DateTimePicker::classname(), [
               'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                'options' => ['placeholder' => 'Enter event time ...'],
                'value' => '23-Feb-1982 01:10',
                
                'layout' => '{picker}{input}',
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => 'mm/dd/yyyy hh:ii:ss',
                ]
        ]); ?>

            <?= $form->field($model, 'end_at')->widget(DateTimePicker::classname(), [
               // 'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
                'options' => ['placeholder' => 'Enter event time ...'],
                'layout' => '{picker}{input}',
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => 'mm/dd/yyyy hh:ii:ss',
                ]
        ]); ?>

            <?= $form->field($model, 'is_show')->widget(CheckboxX::classname(), [
                        'autoLabel'=>false,
                        'pluginOptions' => [
                            'threeState' => false,
                            'size' => 'md',
                        ]
                    ])->label("Is Show"); ?>

            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'body')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'advanced'
            ]) ?>
            <?php 
                $langues = BLanguecenter::find()->where(['is_show' => 1])->orderBy('ordinal_view ASC')->all();
                $id = '';
                $name = '';
                if($langues):
                foreach($langues as $category):
                $id[] = $category->ID;
                $name[] = $category->name;
                endforeach;
                $result = array_combine($id, $name);
                else:
                $result = array("0"=>"No langue's center found");
                endif;
            ?>
            <?= $form->field($model, 'show_in')->dropDownList($result,['prompt'=>yii::t('backend','Home')]);?>
            <?= $form->field($model, 'type')->dropDownList(['image' => yii::t('advertise','Image'), 'html' => 'Html', 'flash' => 'Flash'], ['placeholder'=>yii::t('advertise','Selecting type...')],['maxlenght'=> true]); ?>
            <?= $form->field($model, 'position')->dropDownList(['right' => yii::t('advertise','Right'), 'top' => yii::t('advertise','Top'), 'body' => yii::t('advertise','Campain')], ['placeholder'=>yii::t('advertise','Selecting position..')],['maxlenght'=> true]); ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? yii::t('advertise','Create') : yii::t('advertise','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
