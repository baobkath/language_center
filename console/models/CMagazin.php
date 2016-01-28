<?php
namespace console\models;

/**
 * This is the model class for table "magazin".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $level
 * @property string $create_at
 */

class CMagazin extends \common\models\Magazin
{
    public function getDaytoNow(){
       
        $day_1 = strtotime($this->create_at);
        $day_2 = strtotime(date('Y-m-d')) ; //current date
        $num_day = ((int)($day_2 - $day_1) / (int)(60 * 60 * 24));        
        return round($num_day);
    }
}