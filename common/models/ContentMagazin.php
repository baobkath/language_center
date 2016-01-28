<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content_magazin".
 *
 * @property integer $Day
 * @property string $Level
 * @property string $Subject
 * @property string $Content
 */
class ContentMagazin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_magazin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Day', 'Level', 'Subject', 'Content'], 'required'],
            [['Day'], 'integer'],
            [['Content'], 'string'],
            [['Level'], 'string', 'max' => 2],
            [['Subject'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Day' => Yii::t('magazin', 'Day'),
            'Level' => Yii::t('magazin', 'Level'),
            'Subject' => Yii::t('magazin', 'Subject'),
            'Content' => Yii::t('magazin', 'Content'),
        ];
    }
}
