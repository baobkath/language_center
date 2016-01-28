<?php

namespace backend\controllers;

use Yii;
use backend\models\BLanguecenter;
use backend\models\SearchLanguecenter;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use common\components\CController;

/**
 * LanguecenterController implements the CRUD actions for BLanguecenter model.
 */
class LanguecenterController extends CController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->view->params['title'] = 'title default';
        $this->layout = '@backend/views/layouts/layoutbackend';

        return true; // or false to not run the action
    }
    /**
     * Lists all BLanguecenter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchLanguecenter();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BLanguecenter model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BLanguecenter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('manage-languagecenter')) {
        $model = new BLanguecenter();
        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $image = $model->uploadImage();
            $image_icon = $model->uploadImageIcon();
            //die($model->image);
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) {
                    $path = $model->getImageFile();
                    $image->saveAs($path);
                }
                if ($image_icon !== false) {
                    $path1 = $model->getImageFileIcon();
                    $image_icon->saveAs($path1);
                    //die($model->getImageUrlIcon());
                }
                print_r($model->errors);
                return $this->redirect(['view', 'id'=>$model->ID]);
                
            }
            else{
                print_r($model->errors);
            }
        }
        return $this->render('create', [
            'model'=>$model,
        ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing BLanguecenter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         if (\Yii::$app->user->can('manage-languagecenter')) {      
        $model = $this->findModel($id);

        $oldFile = $model->getImageFile();
        
        $oldAvatar = $model->image;
        $oldFileIcon = $model->getImageFileIcon();
        
        $oldIcon = $model->icon;
       
        //$oldFileName = $model->filename;
 
        if ($model->load(Yii::$app->request->post())) {
            
            // process uploaded image file instance
            $image = $model->uploadImage();
            $image_icon = $model->uploadImageIcon();
             
            // revert back if no valid file instance uploaded
            if ($image === false) {
                $model->image = $oldAvatar;
            }
            if ($image_icon === false) {
                $model->icon = $oldIcon;
            }
 
            if ($model->save()) {
                //die($model->memName);
                // upload only if valid uploaded file instance found
                if ($image !== false && unlink($oldFile)) { // delete old and overwrite
                    $path = $model->getImageFile();
                    $image->saveAs($path);
                }
                if ($image_icon !== false && unlink($oldFileIcon)) { // delete old and overwrite
                    $path1 = $model->getImageFileIcon();
                    $image_icon->saveAs($path1);
                }
                return $this->redirect(['view', 'id'=>$model->ID]);
            } else {
                // error in saving model
            }
        }
        return $this->render('update', [
            'model'=>$model,
        ]);
        }
        else{
             throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing BLanguecenter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BLanguecenter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BLanguecenter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BLanguecenter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
