<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertise".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $body
 * @property string $start_at
 * @property string $end_at
 * @property integer $is_show
 * @property string $link
 * @property string $type
 * @property string $position
 * @property integer $show_in
 *
 * @property Languecenter $showIn
 */
class Advertise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'start_at', 'end_at', 'link', 'type', 'position'], 'required'],
            [['body','show_in'], 'string'],
            [['start_at', 'end_at'], 'safe'],
            [['is_show', ], 'integer'],
            [['name', 'image', 'link'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 11],
            [['position'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('advertise', 'ID'),
            'name' => Yii::t('advertise', 'Name'),
            'image' => Yii::t('advertise', 'Image'),
            'body' => Yii::t('advertise', 'Body'),
            'start_at' => Yii::t('advertise', 'Start At'),
            'end_at' => Yii::t('advertise', 'End At'),
            'is_show' => Yii::t('advertise', 'Is Show'),
            'link' => Yii::t('advertise', 'Link'),
            'type' => Yii::t('advertise', 'Type'),
            'position' => Yii::t('advertise', 'Position'),
            'show_in' => Yii::t('advertise', 'Show In'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShowIn()
    {
        return $this->hasOne(Languecenter::className(), ['ID' => 'show_in']);
    }
}
