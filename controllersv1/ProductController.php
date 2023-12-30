<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use app\models\ProductComponent;
use app\models\ProductGrade;
use app\models\ProductComponentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {

        $searchModel = new ProductSearch();
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
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {

        $model = new Product();
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->product_id]);
        // }
        if ($model->load(Yii::$app->request->post())) {
        $model->save();
      //  echo $model->product_id;
        
        $grade = (Yii::$app->request->post('grade_name'));
        if($grade){
            foreach($grade as $one){
                $modelgrade = new ProductGrade();
                $modelgrade->product_id = $model->product_id;
                $modelgrade->name = $one;
                $modelgrade->save();
              //  echo $one."<br>";
             //   echo $model->product_id;
            }  
        }
      
        $com = (Yii::$app->request->post('component_name'));
        if($com){
            foreach($com as $one){
                $modelComponent = new ProductComponent();
                $modelComponent->product_id = $model->product_id;
                $modelComponent->name = $one;
                $modelComponent->save();
                // echo $one."<br>";
                // echo $model->product_id;
                
            }
        }
        
        return $this->redirect(['view', 'id' => $model->product_id]);
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
     * Updates an existing Product model.
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
      //  echo $model->product_id;
        
        $grade = (Yii::$app->request->post('grade_name'));
        if($grade){
            foreach($grade as $one){
                $modelgrade = new ProductGrade();
                $modelgrade->product_id = $model->product_id;
                $modelgrade->name = $one;
                $modelgrade->save();
              //  echo $one."<br>";
             //   echo $model->product_id;
            }  
        }
      
        $com = (Yii::$app->request->post('component_name'));
        if($com){
            foreach($com as $one){
                $modelComponent = new ProductComponent();
                $modelComponent->product_id = $model->product_id;
                $modelComponent->name = $one;
                $modelComponent->save();
                // echo $one."<br>";
                // echo $model->product_id;
                
            }
        }

            return $this->redirect(['view', 'id' => $model->product_id]);
        }else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
        
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {

       $model =  $this->findModel($id);
       $model->is_delete = 1;
       $model->save();

        return $this->redirect(['index']);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (!Yii::$app->user->isGuest) {

        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }
}
