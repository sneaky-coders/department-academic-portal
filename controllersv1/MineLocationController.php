<?php

namespace app\controllers;

use Yii;
use app\models\MineLocation;
use app\models\MineLocationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MineLocationController implements the CRUD actions for MineLocation model.
 */
class MineLocationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MineLocation models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
        $searchModel = new MineLocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Displays a single MineLocation model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->isGuest) {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Creates a new MineLocation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {

        $model = new MineLocation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Updates an existing MineLocation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest) {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Deletes an existing MineLocation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {

       $model =  $this->findModel($id);
       $model->is_deleted = 1;
       $model->save();

        return $this->redirect(['index']);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Finds the MineLocation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MineLocation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (!Yii::$app->user->isGuest) {

        if (($model = MineLocation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }
}
