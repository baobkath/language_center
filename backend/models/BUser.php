<?php

namespace backend\models;


/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $confirmed_at
 * @property string $unconfirmed_email
 * @property integer $blocked_at
 * @property string $role
 * @property string $registration_ip
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $flags
 *
 * @property Profile $profile
 */

use Yii;
use backend\models\BAuthItem;
use dektrium\user\models\User as BaseUser;
class BUser extends BaseUser 
{
    public function getAuthName($name = '') {
        $auths = BAuthItem::find()->all();
        foreach ($auths as $auth) {
            if ("ROLE_" . strtoupper($auth->name) == $name) {
                return $auth->name;
            }
        }
        return '';
    }

    public function rules() {
        $rules = parent::rules();
        $rules[] = ['role', 'in', 'range' => [self::getAuthName('ROLE_MEMBER'), self::getAuthName('ROLE_SYSADMIN')]];
        return $rules;
    }

    public function loginAdmin() {
        if ($this->validate() && (User::isAdmin($this->username) || User::isSuperAdmin($this->username))) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * function check role is admin
     * @param type $username
     * @return boolean
     */
    public function isAdmin($username) {
        if (BUser::findOne(['username' => $username, 'role' => self::getAuthName('ROLE_ADMIN')])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * function check user role is super admin
     * @param type $username
     * @return boolean
     */
    public function isSuperAdmin($username) {
        if (BUser::findOne(['username' => $username, 'role' => self::getAuthName('ROLE_SYSADMIN')])) {
            return true;
        } else {
            return false;
        }
    }
}