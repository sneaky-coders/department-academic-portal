<?php

namespace app\controllers;

use Yii;
use app\models\Faculty;
use app\models\Users;
use app\models\SearchFaculty;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * FacultyController implements the CRUD actions for Faculty model.
 */
class FacultyController extends Controller
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
     * Lists all Faculty models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest)
        {
            $searchModel = new SearchFaculty();
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
     * Displays a single Faculty model.
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
     * Creates a new Faculty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = new Faculty();

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

    public function actionGetUserDetails($id)
    {
        if(!Yii::$app->user->isGuest)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;

            try {
                // Fetch user details based on the provided user ID
                $user = Users::findOne($id);
    
                if ($user !== null) {
                    return [
                        'name' => $user->username,
                        'email' => $user->email,
                        'contact' => $user->contact,
                        // Add or remove attributes as needed
                    ];
                } else {
                    return ['error' => 'User not found'];
                }
            } catch (\Exception $e) {
                Yii::error('Error fetching user details: ' . $e->getMessage(), 'faculty');
                return ['error' => 'An error occurred while fetching user details'];
            }
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
       
    }
    /**
     * Updates an existing Faculty model.
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
     * Deletes an existing Faculty model.
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
     * Finds the Faculty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faculty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faculty::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
