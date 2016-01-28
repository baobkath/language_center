<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "advertise".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $start_at
 * @property string $end_at
 * @property integer $is_show
 * @property string $link
 */

class FAdvertise extends \common\models\Advertise
{
    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $image = $this->image;
        return Yii::$app->urlManager->baseUrl . '/admin/uploads/advertise/' . $image;
    }
}