<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertise_click".
 *
 * @property string $id
 * @property string $Ip
 * @property integer $IdAd
 * @property string $click_at
 *
 * @property Advertise $idAd
 */
class AdvertiseClick extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertise_click';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Ip', 'IdAd'], 'required'],
            [['IdAd'], 'integer'],
            [['click_at'], 'safe'],
            [['Ip'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('advertise', 'ID'),
            'Ip' => Yii::t('advertise', 'Ip'),
            'IdAd' => Yii::t('advertise', 'Id Ad'),
            'click_at' => Yii::t('advertise', 'Click At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAd()
    {
        return $this->hasOne(Advertise::className(), ['id' => 'IdAd']);
    }
}
