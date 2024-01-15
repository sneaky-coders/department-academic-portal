<?php

namespace app\controllers;

use Yii;
use app\models\Facultyallotment;
use app\models\SearchFacultyallotment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FacultyAllotmentController implements the CRUD actions for Facultyallotment model.
 */
class FacultyAllotmentController extends Controller
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
     * Lists all Facultyallotment models.
     * @return mixed
     */
    // Assuming you're using ActiveRecord for your model
/*public function actionIndex()
{
    $searchModel = new SearchFacultyallotment();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    // Modify the query to exclude repeated faculties
    $query = Facultyallotment::find()
        ->select(['facultyallotment.*', 'COUNT(*) as facultyCount'])
        ->joinWith(['faculty'])
        ->groupBy(['user_id'])
        ->having(['<>', 'COUNT(*)', 1]);

    $dataProvider->query = $query;

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}
*/

public function actionIndex()
{
    if(!Yii::$app->user->isGuest)
        {
            $searchModel = new SearchFacultyallotment();
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
     * Displays a single Facultyallotment model.
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
     * Creates a new Facultyallotment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest)
        {
            $model = new Facultyallotment();

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
     * Updates an existing Facultyallotment model.
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
     * Deletes an existing Facultyallotment model.
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
     * Finds the Facultyallotment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Facultyallotment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Facultyallotment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
