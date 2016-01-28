<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "config_param".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $description
 * @property integer $status
 */
class ConfigParam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config_param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value', 'description'], 'required'],
            [['value', 'description'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'value' => Yii::t('backend', 'Value'),
            'description' => Yii::t('backend', 'Description'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }
}
