<?php 
namespace common\rbac; 

use yii\rbac\Rule; 
/**  * Checks if user role matches user passed via params  */ 
class UserRoleRule extends Rule {     
    public $name = 'userRole';     
    public function execute($user, $item, $params){         //check the role from table user         
        if(isset(\Yii::$app->user->identity->role))
	     $role = \Yii::$app->user->identity->role;
	else
	     return false;
 
        if ($item->name === 'sysadmin') {
            return $role == 'sysadmin';
        } elseif ($item->name === 'admin') {
            return $role == 'sysadmin' || $role == 'admin'; //editor is a child of admin
        }elseif ($item->name === 'member') {
            return $role == 'sysadmin' || $role == 'admin' || $role == 'member' || $role = NULL; 
//user is a child of editor and admin, if we have no role defined this is also the default role
        } else {
            return false;
        }
    }
}