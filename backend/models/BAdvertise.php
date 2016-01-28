<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

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

class BAdvertise extends \common\models\Advertise
{
    public $img;
     
      /**
     * @inheritdoc
     */
    public function rules()
    {
       
         return    array_merge(
               parent::rules(),
               [[['img'], 'file', 'extensions' => 'jpg, gif, png']]  
            );
    }
    
    public function attributeLabels()
    {
        return array_merge(
            parent::attributeLabels(),
            ['img' => Yii::t('languecenter', 'Image'),]            
        );
    }
    
    /**
     * fetch stored image file name with complete path 
     * @return string
     */
    public function getImageFile() 
    {
        return isset($this->image) ? Yii::$app->basePath . '/web/uploads/advertise/' . $this->image : null;
    }
 
    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $memImage = isset($this->image) ? $this->image : 'default_advertise.jpg';
        return Yii::$app->urlManager->baseUrl . '/uploads/advertise/' . $memImage;
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
    * Process deletion of image
    *
    * @return boolean the status of deletion
    */
    public function deleteImage() {
        $file = $this->getImageFile();
 
        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }
 
        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }
 
        // if deletion successful, reset your file attributes
        $this->image = null;

 
        return true;
    }
}