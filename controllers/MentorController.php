<?php

namespace app\controllers;

use Yii;
use app\models\Mentor;
use app\models\SearchMentor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MentorController implements the CRUD actions for Mentor model.
 */
class MentorController extends Controller
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
     * Lists all Mentor models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest)
        {
            $searchModel = new SearchMentor();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
       
    }

    /**
     * Displays a single Mentor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest)
        {
             return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
       
    }

    /**
     * Creates a new Mentor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = new Mentor();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
    
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
       
    }

    /**
     * Updates an existing Mentor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
    
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
       
    }

    /**
     * Deletes an existing Mentor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest)
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
      
    }

    /**
     * Finds the Mentor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mentor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mentor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
