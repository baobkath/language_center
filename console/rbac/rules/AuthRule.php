<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace console\rbac\rules;

use yii\rbac\Rule;

use frontend\models\FCuration;
use frontend\models\FTopic;

class AuthorRule extends Rule{
    public $name = 'isAuthor';
    
    /**
     * function run when call checkAccess
     * if user is memeber so params must provide
     * topic_id to looking for user_id map with this topic
     * if user_id is $user so member can update
     * his/her owner post
     * @param type $user
     * @param type $item
     * @param type $params
     * @return boolean
     */
    public function execute($user, $item, $params) {
        if($item->name == 'admin' || $item->name == 'superadmin'){
            return true;
        }else{
            if(!empty($params)){
                $query = (new \yii\db\Query())->createCommand();
                $query->sql = "SELECT topic.id FROM topic INNER JOIN curation ON curation.id = topic.curation_id WHERE curation.user_id = '$user'";
                $topic = $query->queryOne();
                return ($topic['id'] == $params['topicId']) ? true : false;
            }
        }
        return false;
    }
}