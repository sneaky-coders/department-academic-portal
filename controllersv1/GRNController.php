<?php

namespace app\controllers;

use Yii;
use app\models\GRN;
use app\models\GRNSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GRNController implements the CRUD actions for GRN model.
 */
class GRNController extends Controller
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
     * Lists all GRN models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GRNSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GRN model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GRN model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GRN();
        
            return $this->render('create', [
                'model' => $model,
                ]); 
    }

    public function actionSave($purchase_contract_id,$supplier_id)
    {
         
        $model = new GRN();
            if ($model->load(Yii::$app->request->post())) {
                $model->supplier_id = $supplier_id;
                //$model->purchase_contract_id;
                $model->save();
                return $this->redirect(['purchase-contract/view', 'id' => $model->purchase_contract_id]);
            }else{
                $model->purchase_contract_id = $purchase_contract_id;
                $model->supplier_id = $supplier_id;
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
    }

    /**
     * Updates an existing GRN model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['purchase-contract/view', 'id' => $model->purchase_contract_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GRN model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        //$model->is_delete = 1;
        //$model->save();
        return $this->redirect(['purchase-contract/view', 'id' => $model->purchase_contract_id]);
    }

    /**
     * Finds the GRN model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GRN the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GRN::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
