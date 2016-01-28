<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "languecenter".
 *
 * @property integer $ID
 * @property string $name
 * @property string $decription
 * @property string $icon
 * @property string $image
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $schedule
 * @property string $url
 * @property double $rate
 * @property integer $ordinal_view
 * @property integer $is_show
 * @property integer $number
 * @property string $slug
 * @property integer $active
 *
 * @property Advertise[] $advertises
 * @property RateCenter[] $rateCenters
 */
class Languecenter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languecenter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'decription', 'address', 'email', 'phone', 'schedule', 'url', 'slug'], 'required'],
            [['rate'], 'number'],
            [['ordinal_view', 'is_show', 'number', 'active'], 'integer'],
            [['name', 'icon', 'image', 'address', 'email', 'url'], 'string', 'max' => 100],
            [['decription', 'schedule', 'slug'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('languecenter', 'ID'),
            'name' => Yii::t('languecenter', 'Name'),
            'decription' => Yii::t('languecenter', 'Decription'),
            'icon' => Yii::t('languecenter', 'Icon'),
            'image' => Yii::t('languecenter', 'Image'),
            'address' => Yii::t('languecenter', 'Address'),
            'email' => Yii::t('languecenter', 'Email'),
            'phone' => Yii::t('languecenter', 'Phone'),
            'schedule' => Yii::t('languecenter', 'Schedule'),
            'url' => Yii::t('languecenter', 'Url'),
            'rate' => Yii::t('languecenter', 'Rate'),
            'ordinal_view' => Yii::t('languecenter', 'Ordinal View'),
            'is_show' => Yii::t('languecenter', 'Is Show'),
            'number' => Yii::t('languecenter', 'Number'),
            'slug' => Yii::t('languecenter', 'Slug'),
            'active' => Yii::t('languecenter', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertises()
    {
        return $this->hasMany(Advertise::className(), ['show_in' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRateCenters()
    {
        return $this->hasMany(RateCenter::className(), ['id_center' => 'ID']);
    }
}
