<?php

namespace frontend\models;

use Yii;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "languecenter".
 *
 * @property integer $ID
 * @property string $name
 * @property string $decription
 * @property string $image
 * @property string $address
 * @property string $email
 * @property string $schedule
 * @property string $url
 * @property double $rate
 * @property integer $ordinal_view
 * @property integer $is_show
 * @property integer $number
 */

class FLanguecenter extends \common\models\Languecenter
{
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'value' => function ($event) {
                    return str_replace(' ', '-', $this->name);
                }
            ]
        ];
    }
    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $image = $this->image;
        return Yii::$app->urlManager->baseUrl . '/admin/uploads/center/' . $image;
    }
    public function getImageUrlIcon() 
    {
        // return a default image placeholder if your source avatar is not found
        $icon = $this->icon;
        return Yii::$app->urlManager->baseUrl . '/admin/uploads/center/' . $icon;
    }
    public function getImageRate(){
        switch (round($this->rate)){
            case 1: return "/../../images/stars-1.png";
            case 2: return "/../../images/stars-2.png";
            case 3: return "/../../images/stars-3.png";
            case 4: return "/../../images/stars-4.png";
            case 5: return "/../../images/stars-5.png";
            default:
                return "/../../images/stars-0.png";
        }
    }
}