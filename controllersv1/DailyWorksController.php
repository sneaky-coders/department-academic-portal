<?php

namespace app\controllers;

use Yii;
use app\models\DailyWorks;
use app\models\DailyWorksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DailyWorksController implements the CRUD actions for DailyWorks model.
 */
class DailyWorksController extends Controller
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
     * Lists all DailyWorks models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
        $searchModel = new DailyWorksSearch();
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
     * Displays a single DailyWorks model.
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
     * Creates a new DailyWorks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {
        $model = new DailyWorks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->daily_works_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Updates an existing DailyWorks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {   if (!Yii::$app->user->isGuest) {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->daily_works_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Deletes an existing DailyWorks model.
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
     * 
     * Finds the DailyWorks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DailyWorks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (!Yii::$app->user->isGuest) {
        if (($model = DailyWorks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    public function actionReport()
    {
        if (!Yii::$app->user->isGuest) {
            $searchModel = new DailyWorksSearch();
            if(Yii::$app->request->post()){
                
                $from = Yii::$app->request->post('from');
                $to = Yii::$app->request->post('to');
                $location = Yii::$app->request->post('location');
                $nature = Yii::$app->request->post('nature');
            
                if($from && $to || $location || $nature){
                    $searchModel->to = $to;
                    $searchModel->from = $from;
                    $searchModel->nature_of_job =  $nature ;
                    $searchModel->location = $location;
                    
                }else{
                    $searchModel->from = date('Y-m-01');
                    $searchModel->to = date('Y-m-t');
                }
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    return $this->render('report', [
                        'dataProvider' => $dataProvider,
                    ]);     
            }
            $searchModel->from = date('Y-m-01');
            $searchModel->to = date('Y-m-t');
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('report', [
                'dataProvider' => $dataProvider,
            ]);

        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }
}
