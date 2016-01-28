<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "magazin".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $level
 * @property string $create_at
 */

class FMagazin extends \common\models\Magazin
{
    public $verifyCode;
    public function rules()
    {
        return    array_merge(
               parent::rules(),
               [['verifyCode', 'captcha'],]  
            );
    }
    
    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(),
            ['verifyCode' => '',]
            
        );
    }
}