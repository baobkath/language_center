<?php

namespace backend\models;


class LoginForm extends \dektrium\user\models\LoginForm {

    /**
     * @inheritdoc
     */
    public function rules() {
        $rules = parent::rules();
        return $rules;
    }

    public function login() {
        if ($this->validate()) {
            
            return \Yii::$app->getUser()->login($this->user, $this->rememberMe ? $this->module->rememberFor : 0);
           
        } else {
            return false;
        }
    }

}
