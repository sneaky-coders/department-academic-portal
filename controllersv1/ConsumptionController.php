<?php

namespace app\controllers;

use Yii;
use app\models\Consumption;
use app\models\ConsumptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConsumptionController implements the CRUD actions for Consumption model.
 */
class ConsumptionController extends Controller
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
     * Lists all Consumption models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
        $searchModel = new ConsumptionSearch();
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
     * Displays a single Consumption model.
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
     * Creates a new Consumption model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {
        $model = new Consumption();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->consumption_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Updates an existing Consumption model.
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
            return $this->redirect(['view', 'id' => $model->consumption_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Deletes an existing Consumption model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
        $model = $this->findModel($id);
        $model->is_delete = 1;
        $model->save();


        return $this->redirect(['index']);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Finds the Consumption model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consumption the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (!Yii::$app->user->isGuest) {
        if (($model = Consumption::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }
}
