<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "languecenter".
 *
 * @property integer $ID
 * @property string $name
 * @property string $decription
 * @property string $image
 * @property string $address
 * @property string $schedule
 * @property string $url
 * @property double $rate
 */

class BLanguecenter extends \common\models\Languecenter
{
    public $img;
    public $img_icon;
    
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
     * @inheritdoc
     */
    public function rules()
    {
        return    array_merge(
               parent::rules(),
               [[['img','img_icon'], 'file', 'extensions' => 'jpg, gif, png']]  
            );
    }
    
    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(),
            ['img' => Yii::t('languecenter', 'Image'),],
            ['img_icon' => Yii::t('languecenter', 'Icon'),]
        );
    }

    /**
     * fetch stored image file name with complete path 
     * @return string
     */
    public function getImageFile() 
    {
        return isset($this->image) ? Yii::$app->basePath . '/web/uploads/center/' . $this->image : null;
    }
    
    public function getImageFileIcon() 
    {
        return isset($this->icon) ? Yii::$app->basePath . '/web/uploads/center/' . $this->icon : null;
    }
    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $image = isset($this->image) ? $this->image : 'default_center.png';
        return Yii::$app->urlManager->baseUrl . '/uploads/center/' . $image;
    }
    
    public function getImageUrlIcon() 
    {
        // return a default image placeholder if your source avatar is not found
        $icon = isset($this->icon) ? $this->icon : 'default_icon.png';
        return Yii::$app->urlManager->baseUrl . '/uploads/center/' . $icon;
    }
    /**
    * Process upload of image
    *
    * @return mixed the uploaded image instance
    */
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $img = UploadedFile::getInstance($this, 'img');
        
        // if no image was uploaded abort the upload
        if (empty($img)) {
            return false;            
        } 
        // store the source file name       
        $ext = end((explode(".", $img->name)));
 
        // generate a unique file name
        $this->image = Yii::$app->security->generateRandomString().".{$ext}";
 
        // the uploaded image instance
        return $img;
    }
    
    /**
    * Process upload of image
    *
    * @return mixed the uploaded image instance
    */
    public function uploadImageIcon() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $img_icon = UploadedFile::getInstance($this, 'img_icon');
        
        // if no image was uploaded abort the upload
        if (empty($img_icon)) {
            return false;            
        } 
        // store the source file name       
        $ext = end((explode(".", $img_icon->name)));
 
        // generate a unique file name
        $this->icon = Yii::$app->security->generateRandomString().".{$ext}";
 
        // the uploaded image instance
        return $img_icon;
    }
 
    /**
    * Process deletion of image
    *
    * @return boolean the status of deletion
    */
    public function deleteImage() {
        $file = $this->getImageFile();
        $fileicon = $this->getImageFileIcon();
        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }
        if (empty($fileicon) || !file_exists($fileicon)) {
            return false;
        }
 
        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }
        
        if (!unlink($fileicon)) {
            return false;
        }
 
        // if deletion successful, reset your file attributes
        $this->image = null;
        $this->icon = null;
 
        return true;
    }
}