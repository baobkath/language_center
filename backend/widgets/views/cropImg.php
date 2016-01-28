<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace frontend\widgets;


class cropImg extends \yii\bootstrap\Widget{
    public $btn_name;
    public function init() {
        parent::init();
    }
    
    public function run() {
        parent::run();
        return $this->render('@frontend/views/widget/cropImg',['btn_name' => $this->btn_name]);
    }
}

