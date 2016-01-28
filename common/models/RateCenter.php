<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rate_center".
 *
 * @property integer $id
 * @property string $user_session
 * @property integer $id_center
 * @property integer $value
 * @property string $rate_at
 *
 * @property Languecenter $idCenter
 */
class RateCenter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rate_center';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_session', 'id_center', 'value', 'rate_at'], 'required'],
            [['id_center', 'value'], 'integer'],
            [['rate_at'], 'safe'],
            [['user_session'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('languecenter', 'ID'),
            'user_session' => Yii::t('languecenter', 'User Session'),
            'id_center' => Yii::t('languecenter', 'Id Center'),
            'value' => Yii::t('languecenter', 'Value'),
            'rate_at' => Yii::t('languecenter', 'Rate At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCenter()
    {
        return $this->hasOne(Languecenter::className(), ['ID' => 'id_center']);
    }
}
