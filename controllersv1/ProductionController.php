<?php

namespace app\controllers;

use Yii;
use app\models\Production;
use app\models\ProductionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ProductComponent;
use app\models\Product;
use app\models\ProductionAnalysis;

/**
 * ProductionController implements the CRUD actions for Production model.
 */
class ProductionController extends Controller
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
     * Lists all Production models.
     * @return mixed
     */
    public function actionIndex()
    { 
        if (!Yii::$app->user->isGuest) {

        $searchModel = new ProductionSearch();
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
     * Displays a single Production model.
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
     * Creates a new Production model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {
            $model = new Production();

            if ($model->load(Yii::$app->request->post())){
                $comp_val = (Yii::$app->request->post('comp_value'));

                $model->save();
                // echo $model->production_id."<br>";

                if($comp_val){
                    $product_comp = ProductComponent::find()->where(['product_id' => $model->product_id])->all();
                    $index = 0;
                    foreach($product_comp as $comp){
                        if ($comp_val[$index]){
                            echo "addd--",$comp_val[$index],'compid -- ',$comp->product_component_id,"<br>";
                            $product_analysis= new ProductionAnalysis();
                            $product_analysis->production_id = $model->production_id;
                            $product_analysis->component_id = $comp->product_component_id;
                            $product_analysis->value = $comp_val[$index];
                            $product_analysis->save();
                        }
                    
                        $index++;
                    } 
        
                }  
                return $this->redirect(['view', 'id' => $model->production_id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
        
    }

    /**
     * Updates an existing Production model.
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
                $comp_val = (Yii::$app->request->post('comp_value'));
            
                $product_analysis_all = ProductionAnalysis::find()->where(['production_id' => $model->production_id])->all();
                $model->save();

                // deleteing previous data
                foreach($product_analysis_all as $va){
                    //  echo $va->production_id."<br>";
                    $product_analysis_one = ProductionAnalysis::find()->where(['production_id' => $va->production_id])->one();
                    $product_analysis_one->delete();
                }

                // adding new data
                if($comp_val){
                    $product_comp = ProductComponent::find()->where(['product_id' => $model->product_id])->all();
                    $index = 0;
                    foreach($product_comp as $comp){
                        if ($comp_val[$index]){
                            echo "addd--",$comp_val[$index],'compid -- ',$comp->product_component_id,"<br>";
                            $product_analysis= new ProductionAnalysis();
                            $product_analysis->production_id = $model->production_id;
                            $product_analysis->component_id = $comp->product_component_id;
                            $product_analysis->value = $comp_val[$index];
                            $product_analysis->save();
                        }
                    
                        $index++;
                    } 
                }
                return $this->redirect(['view', 'id' => $model->production_id]);
            }else{
                $model = $this->findModel($id);
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }


        
    }

    /**
     * Deletes an existing Production model.
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
     * Finds the Production model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Production the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (!Yii::$app->user->isGuest) {
        if (($model = Production::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    public function actionComponent()
    {
        
        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $p_id =  $data['data']; 
            $product_comp = ProductComponent::find()->asArray()->where(['product_id' => $p_id])->all();

            array($product_comp);
            //   echo json_encode($data)$;
        
            return json_encode(['data' => $data,'comp'=> $product_comp ]); 

         
        }
    }

    public function actionComponentup()
    {
        if (Yii::$app->request->isAjax) {
            
            $data = Yii::$app->request->post();   
            $p_id =  $data['data']; 
            $product_comp = ProductComponent::find()->asArray()->where(['product_id' => $p_id])->all();
            // return json_encode(['data' => $data,'comp'=> $product_comp ]); 
            array($product_comp);
            // echo json_encode($data)$;
            $product_analysis = ProductionAnalysis::find()->asArray()->where(['production_id' => $data['production_id']])->all();
            return json_encode(['data' => $data,'comp'=> $product_comp,'product_analysis' =>$product_analysis ]); 

         
        }
    }

}
