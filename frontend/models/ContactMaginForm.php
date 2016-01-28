<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactMaginForm extends Model
{
    public $name;
    public $companyName;
    public $email;
    public $phone;
    public $decription;
    public $address;
    public $schedule;
    public $url;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name','companyName', 'email','phone','decription','address', 'schedule', 'url'], 'required',],
            // email has to be a valid email address
            ['email', 'email'],
            [['url'], 'url'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => '',
            'name'=>'',
            'email'=>'',
            'companyName'=>'',
            'phone'=>'',
            'decription'=>'',
            'address'=>'',
            'schedule'=>'',
            'url'=>''
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose('@frontend/views/mail/contact_magin', ['contact' => $this])
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject('Đăng ký thông tin đăng lên trung tâm')
            ->send();
    }
}
