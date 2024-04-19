<?php

namespace app\controllers;

use Yii;
use app\models\Randomtimetable; // Assuming your model is named RandomTimetable
use app\models\SearchRandomtimetable; // Assuming your model is named RandomTimetable
use app\models\Timetable; // Assuming your timetable model is named Timetable
use app\models\Courses; // Assuming your timetable model is named Timetable
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider; // Add this line

/**
 * RandomtimetableController implements the CRUD actions for Randomtimetable model.
 */
class RandomtimetableController extends Controller
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
     * Lists all Randomtimetable models.
     * @return mixed
     */
  

     public function actionGenerateRandomTimetable()
     {
         $model = new Randomtimetable();
 
         try {
             $timetable = $model->generateRandomTimetable();
 
             if ($timetable) {
                 Yii::$app->session->setFlash('success', 'Random timetable generated and saved successfully!');
             } else {
                 Yii::$app->session->setFlash('error', 'Failed to generate random timetable.');
             }
         } catch (\Exception $e) {
             Yii::$app->session->setFlash('error', 'An error occurred: ' . $e->getMessage());
         }
 
         return $this->redirect(['index']); // Redirect to the desired page
     }

    /**
     * Lists all Timetable models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest)
        {
            $searchModel = new SearchRandomtimetable(); // Assuming your search model is named SearchRandomtimetable
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

public function actionDeleteAllRecords()
{
    if(!Yii::$app->user->isGuest)
        {
            Randomtimetable::deleteAll();

            // Redirect to the index page or any other page
            return $this->redirect(['index']);
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
    // Delete all records from the Randomtimetable model
  
}


    /**
     * Displays a single Randomtimetable model.
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
     * Creates a new Randomtimetable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = new Randomtimetable();

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
     * Updates an existing Randomtimetable model.
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
     * Deletes an existing Randomtimetable model.
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

    public function actionSem1a()
    {
        $timetableData = Randomtimetable::find()->all();

        return $this->render('sem1a', [
            'timetableData' => $timetableData,
        ]);
    }

    /**
     * Finds the Randomtimetable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Randomtimetable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Randomtimetable::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
}
