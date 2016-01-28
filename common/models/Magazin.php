<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "magazin".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $level
 * @property string $create_at
 * @property integer $Day
 */
class Magazin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'magazin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'level', 'create_at', 'Day'], 'required'],
            [['create_at'], 'safe'],
            [['Day'], 'integer'],
            [['name', 'email', 'level'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('magazin', 'ID'),
            'name' => Yii::t('magazin', 'Name'),
            'email' => Yii::t('magazin', 'Email'),
            'level' => Yii::t('magazin', 'Level'),
            'create_at' => Yii::t('magazin', 'Create At'),
            'Day' => Yii::t('magazin', 'Day'),
        ];
    }
}
