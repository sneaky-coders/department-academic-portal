<?php

namespace app\controllers;

use Yii;
use app\models\Operation;
use app\models\OperationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Machine;
use app\models\OperationData;

/**
 * OperationController implements the CRUD actions for Operation model.
 */
class OperationController extends Controller
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
     * Lists all Operation models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
        $searchModel = new OperationSearch();
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
     * Displays a single Operation model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {        if (!Yii::$app->user->isGuest) {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Creates a new Operation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {        if (!Yii::$app->user->isGuest) {

        $model = new Operation();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $index = 0;
            if($model->machines){
                foreach($model->machines as $id){
                    $operationData = new OperationData();
                    $operationData->operation_id = $model->operation_id;
                    $operationData->machine_id = $id;
                    $operationData->hours = $model->hours[$index];
                    $operationData->cost_of_machine_operation = $model->cost[$index];
                    $operationData->save();
                    // echo $id,'--',$model->hours[$index],'---',$model->cost[$index],"<br>";
                    $index++;
                }
            }
            
            return $this->redirect(['view', 'id' => $model->operation_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Updates an existing Operation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {        if (!Yii::$app->user->isGuest) {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();
            $operationData = OperationData::find()->where(['operation_id' => $model->operation_id])->all();
            foreach($operationData as $data){
                $data->delete();
            }
            $index = 0;
            if($model->machines){
                foreach($model->machines as $id){
                    $operationData = new OperationData();
                    $operationData->operation_id = $model->operation_id;
                    $operationData->machine_id = $id;
                    $operationData->hours = $model->hours[$index];
                    $operationData->cost_of_machine_operation = $model->cost[$index];
                    $operationData->save();
                    // echo $id,'--',$model->hours[$index],'---',$model->cost[$index],"<br>";
                    $index++;
                }
            }
            return $this->redirect(['view', 'id' => $model->operation_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Deletes an existing Operation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {   
        if (!Yii::$app->user->isGuest) {
        $operationData = OperationData::find()->where(['operation_id' => $id])->all();
        foreach($operationData as $data){
            $data->delete();
        }
        $model  = $this->findModel($id);
        $model->delete();
        

        return $this->redirect(['index']);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Finds the Operation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Operation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {        if (!Yii::$app->user->isGuest) {

        if (($model = Operation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    public function actionGettable()
    {
        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $location_id =  $data['data']; 
            //$product_comp = ProductComponent::find()->asArray()->where(['product_id' => $p_id])->all();
            // return json_encode(['data' => $data,'comp'=> $product_comp ]); 
            //array($product_comp);
            // echo json_encode($data)$;
            $machines = Machine::find()->asArray()->where(['mine_location_id' => $location_id])->all();
            return json_encode(['data' => $machines]); 

         
        }
    }
    public function actionGettableupdate()
    {
        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $location_id =  $data['data']; 
            $operation_id =  $data['operation_id']; 
            //$product_comp = ProductComponent::find()->asArray()->where(['product_id' => $p_id])->all();
            // return json_encode(['data' => $data,'comp'=> $product_comp ]); 
            //array($product_comp);
            // echo json_encode($data)$;
            $machines = Machine::find()->asArray()->where(['mine_location_id' => $location_id])->all();
            $operationData = OperationData::find()->asArray()->where(['operation_id' => $operation_id])->all();
            return json_encode(['data' => $machines,'operations' => $operationData]); 

         
        }
    }
}
