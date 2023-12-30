<?php

namespace app\controllers;

use Yii;
use app\models\Dispatch;
use app\models\DispatchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DispatchController implements the CRUD actions for Dispatch model.
 */
class DispatchController extends Controller
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
     * Lists all Dispatch models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {

            $searchModel = new DispatchSearch();
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
     * Displays a single Dispatch model.
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
     * Creates a new Dispatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {

            $model = new Dispatch();

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->save();
                return $this->redirect(['view', 'id' => $model->dispatch_id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Dispatch model.
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
                return $this->redirect(['view', 'id' => $model->dispatch_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Dispatch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {

            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Finds the Dispatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dispatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dispatch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
  
    }

    // public function actionReport()
    // {
    //     if (!Yii::$app->user->isGuest) {

    //         $searchModel = new DispatchSearch();
           
    //         if(Yii::$app->request->post()){
                
    //             $from = Yii::$app->request->post('from');
    //             $to = Yii::$app->request->post('to');
    //             $product = Yii::$app->request->post('product');
    //             $buyer = Yii::$app->request->post('buyer');
    //             $po_no = Yii::$app->request->post('po_no');

    //             if($from && $to || $product || $buyer || $po_no){
    //             $searchModel->to = $to;
    //             $searchModel->from = $from;
    //             $searchModel->product_id =  $product ;
    //             $searchModel->buyer_id = $buyer;
    //             $searchModel->po_no = $po_no;
                
    //             }else{
    //                 $searchModel->from = date('Y-m-01');
    //                 $searchModel->to = date('Y-m-t');
    //             }
    //             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    //             return $this->render('report', [    
    //                 'dataProvider' => $dataProvider,
    //             ]);

    //             }
    //             $searchModel->from = date('Y-m-01');
    //             $searchModel->to = date('Y-m-t');
    //             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    //             return $this->render('report', [    
    //                 'dataProvider' => $dataProvider,
    //             ]);
                
        
            
    //     }else{
    //         throw new \yii\web\ForbiddenHttpException;
    //     }
    // }
}
