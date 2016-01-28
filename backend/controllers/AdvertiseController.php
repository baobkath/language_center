<?php

namespace backend\controllers;

use Yii;
use backend\models\BAdvertise;
use backend\models\SearchAdvertise;
use common\components\CController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\formatTime;

/**
 * AdvertiseController implements the CRUD actions for BAdvertise model.
 */
class AdvertiseController extends CController
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
     * Lists all BAdvertise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchAdvertise();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BAdvertise model.
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
     * Creates a new BAdvertise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        

        if (\Yii::$app->user->can('manage-advertise')) {
        $model = new BAdvertise();
        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $img = $model->uploadImage();
            $model->start_at = formatTime::convert($model->start_at, 'datetime');
            $model->end_at = formatTime::convert($model->end_at, 'datetime');
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($img !== false) {
                    $path = $model->getImageFile();
                    $img->saveAs($path);
                }
                return $this->redirect(['view', 'id'=>$model->id]);
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
    
    public function actionAdd($id)
    {
        if (\Yii::$app->user->can('manage-advertise')) {
        $model = new BAdvertise();
        $model->show_in = $id;
        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $img = $model->uploadImage();
            $model->start_at = formatTime::convert($model->start_at, 'datetime');
            $model->end_at = formatTime::convert($model->end_at, 'datetime');
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($img !== false) {
                    $path = $model->getImageFile();
                    $img->saveAs($path);
                }
                return $this->redirect(['view', 'id'=>$model->id]);
            } 
        }
        return $this->render('createlang', [
            'model'=>$model,
        ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing BAdvertise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('manage-advertise')) {      
            $model = $this->findModel($id);

            $oldFile = $model->getImageFile();

            $oldAvatar = $model->image;

            //$oldFileName = $model->filename;

            if ($model->load(Yii::$app->request->post())) {

                // process uploaded image file instance
                $img = $model->uploadImage();

                // revert back if no valid file instance uploaded
                if ($img === false) {
                    $model->image = $oldAvatar;


                    //$model->filename = $oldFileName;
                }
                $model->start_at = formatTime::convert($model->start_at, 'datetime');
                $model->end_at = formatTime::convert($model->end_at, 'datetime');
                if ($model->save()) {
                    //die($model->memName);
                    // upload only if valid uploaded file instance found
                    if ($img !== false && unlink($oldFile)) { // delete old and overwrite
                        $path = $model->getImageFile();
                        $img->saveAs($path);
                    }
                    return $this->redirect(['view', 'id'=>$model->id]);
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
     * Deletes an existing BAdvertise model.
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
     * Finds the BAdvertise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BAdvertise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BAdvertise::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
