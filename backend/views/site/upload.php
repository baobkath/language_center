<?php
use yii\widgets\ActiveForm;
use yii\imagine\Image;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>


    <button>Submit</button>

<?php ActiveForm::end() ?>
