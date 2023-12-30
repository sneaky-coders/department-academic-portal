<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\Password;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {       
         if (!Yii::$app->user->isGuest) {

        $searchModel = new UsersSearch();
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
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {     
        if (!Yii::$app->user->isGuest) {

        $model = new Users();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->user_id]);
        // }

        if ($model->load(Yii::$app->request->post())) {
            echo $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->save();
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
     * Updates an existing Users model.
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
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {     
        if (!Yii::$app->user->isGuest) {

        $model = $this->findModel($id);
        $model->is_deleted = 1;
        $model->save();

        return $this->redirect(['index']);

    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {     
        if (!Yii::$app->user->isGuest) {

        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }


    public function actionChangePassword()
    {
        if (!Yii::$app->user->isGuest) {
            $model = new Password();
            
            if($model->load(Yii::$app->request->post())){
                $user = Users::find()->where(['user_id' => Yii::$app->user->identity->user_id])->one();
                $user->password =  Yii::$app->getSecurity()->generatePasswordHash($model->password1);
                $user->save(false);
                $this->redirect(['index']);
            }
            return $this->render('change-password', [
                'model' => $model,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    public function actionChangePasswordAdmin($id)
    {
        if (!Yii::$app->user->isGuest) {
            $model = new Password();
            $user = Users::find()->where(['user_id' => $id])->one();

            if($model->load(Yii::$app->request->post())){
                echo $id;
                $user->password =  Yii::$app->getSecurity()->generatePasswordHash($model->password1);
                $user->save(false);
                $this->redirect(['index']);    
            }
            return $this->render('change-password-admin', [
                'model' => $model,
                'user' => $user
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }
}
