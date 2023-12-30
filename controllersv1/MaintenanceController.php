<?php

namespace app\controllers;

use Yii;
use app\models\Maintenance;
use app\models\MaintenanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaintenanceQuantity;
use app\models\MaintenanceEquipment;

/**
 * MaintenanceController implements the CRUD actions for Maintenance model.
 */
class MaintenanceController extends Controller
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
     * Lists all Maintenance models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
        $searchModel = new MaintenanceSearch();
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
     * Displays a single Maintenance model.
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
     * Creates a new Maintenance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {
        $model = new Maintenance();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $index = 0;
            if($model->raw_material_id){
                foreach($model->raw_material_id as $id){
                    $maintenance_qty = new MaintenanceQuantity();
                    $maintenance_qty->maintenance_id = $model->maintenance_id;
                    $maintenance_qty->raw_material_id = $id;
                    $maintenance_qty->quantity = $model->quantity[$index];
                    $maintenance_qty->save();
    
                $index ++;
                }
            }
            if($model->equipment_id){
                foreach($model->equipment_id as $eq){
                    $maintenance_equipment = new MaintenanceEquipment();
                    $maintenance_equipment->maintenance_id = $model->maintenance_id;
                    $maintenance_equipment->equipment_id = $eq;
                    $maintenance_equipment->save();
                }
            }
        return $this->redirect(['view', 'id' => $model->maintenance_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Updates an existing Maintenance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            //quintity

            $maintenance_qty = MaintenanceQuantity::find()->where(['maintenance_id' => $model->maintenance_id])->all();
            foreach($maintenance_qty as $one){
                $one->delete();
            }
            $index = 0;
            if($model->raw_material_id){
                foreach($model->raw_material_id as $id){
                    $maintenance_qty = new MaintenanceQuantity();
                    $maintenance_qty->maintenance_id = $model->maintenance_id;
                    $maintenance_qty->raw_material_id = $id;
                    $maintenance_qty->quantity = $model->quantity[$index];
                    $maintenance_qty->save();
    
                $index ++;
                }
            }
            //update not working , not deleting 
            //equipement
            $maintenance_equipment = MaintenanceEquipment::find()->where(['maintenance_id' => $model->maintenance_id])->all();
            foreach($maintenance_equipment as $mq){
              
                $mq->delete();
            }

            if($model->equipment_id){
                foreach($model->equipment_id as $eq){
                    $maintenance_eq = new MaintenanceEquipment();
                    $maintenance_eq->maintenance_id = $model->maintenance_id;
                    $maintenance_eq->equipment_id = $eq;
                    $maintenance_eq->save();
                  
                   

                }
            }
            //
            return $this->redirect(['view', 'id' => $model->maintenance_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Deletes an existing Maintenance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);
            $maintenance_qty = MaintenanceQuantity::find()->where(['maintenance_id' => $id])->all();
            foreach($maintenance_qty as $one){
                $one->delete();
            }
            $model->delete();
        

        return $this->redirect(['index']);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Finds the Maintenance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Maintenance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (!Yii::$app->user->isGuest) {
        if (($model = Maintenance::findOne($id)) !== null) {
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

            $searchModel = new MaintenanceSearch();
            if(Yii::$app->request->post()){
                
                $from = Yii::$app->request->post('from');
                $to = Yii::$app->request->post('to');
                $type = Yii::$app->request->post('type');
                $nature = Yii::$app->request->post('nature');

               if($from && $to || $nature || $type){
                    $searchModel->to = $to;
                    $searchModel->from = $from;
                    $searchModel->nature_of_maintenance =  $nature ;
                    $searchModel->type_of_maintenance = $type;
               }else{
                    $searchModel->from = date('Y-m-01');
                    $searchModel->to = date('Y-m-t');
               }
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    return $this->render('report', [
                        'dataProvider' => $dataProvider,
                        'from' => $from,
                        'to' => $to,
                    ]);

            }
            $searchModel->from = date('Y-m-01');
            $searchModel->to = date('Y-m-t');
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('report', [
                'dataProvider' => $dataProvider,
                'from' => date('Y-m-01'),
                'to' => date('Y-m-t'),
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }
}
