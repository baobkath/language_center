<?php

namespace backend\controllers;

use Yii;
use backend\models\BContentMagazin;
use backend\models\SearchContenMagazin;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContentmagazinController implements the CRUD actions for BContentMagazin model.
 */
class ContentmagazinController extends Controller
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
     * Lists all BContentMagazin models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('manage_magazin')) {
            $searchModel = new SearchContenMagazin();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Displays a single BContentMagazin model.
     * @param integer $Day
     * @param string $Level
     * @return mixed
     */
    public function actionView($Day, $Level)
    {
        if (\Yii::$app->user->can('manage_magazin')) {
            return $this->render('view', [
                'model' => $this->findModel($Day, $Level),
            ]);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Creates a new BContentMagazin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('manage_magazin')) {
            $model = new BContentMagazin();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Day' => $model->Day, 'Level' => $model->Level]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing BContentMagazin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Day
     * @param string $Level
     * @return mixed
     */
    public function actionUpdate($Day, $Level)
    {
        if (\Yii::$app->user->can('manage_magazin')) {
            $model = $this->findModel($Day, $Level);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Day' => $model->Day, 'Level' => $model->Level]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing BContentMagazin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Day
     * @param string $Level
     * @return mixed
     */
    public function actionDelete($Day, $Level)
    {
        if (\Yii::$app->user->can('manage_magazin')) {
            $this->findModel($Day, $Level)->delete();

            return $this->redirect(['index']);
        }
        else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the BContentMagazin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Day
     * @param string $Level
     * @return BContentMagazin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Day, $Level)
    {
        if (($model = BContentMagazin::findOne(['Day' => $Day, 'Level' => $Level])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
