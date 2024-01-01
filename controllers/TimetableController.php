<?php

namespace app\controllers;

use Yii;
use app\models\Timetable;
use app\models\SearchTimetable;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TimetableGenerator;
use yii\web\Response;

/**
 * TimetableController implements the CRUD actions for Timetable model.
 */
class TimetableController extends Controller
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
     * Lists all Timetable models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchTimetable();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

   

    

    // Function to generate a random timetable
    

    // Functions to get random values
    

    /**
     * Displays a single Timetable model.
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
     * Creates a new Timetable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Timetable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Timetable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Timetable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSem1a()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem1a', [
            'timetableData' => $timetableData,
        ]);
    }

    public function actionSem1b()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem1b', [
            'timetableData' => $timetableData,
        ]);

        
    }

    public function actionSem2a()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem2a', [
            'timetableData' => $timetableData,
        ]);
    }

    public function actionSem2b()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem2b', [
            'timetableData' => $timetableData,
        ]);
    }


    public function actionSem3a()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem3a', [
            'timetableData' => $timetableData,
        ]);
    }

    public function actionSem3b()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem3b', [
            'timetableData' => $timetableData,
        ]);
    }

    public function actionSem4a()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem4a', [
            'timetableData' => $timetableData,
        ]);
    }

    public function actionSem4b()
    {
        $timetableData = Timetable::find()->all();

        return $this->render('sem4b', [
            'timetableData' => $timetableData,
        ]);
    }


   // Function to check faculty availability
private function checkFacultyAvailability($timeslot, $day, $facultyId)
{
    // Query the database to check if the faculty is already assigned to another class on the same day and timeslot
    $existingEntry = Timetable::find()
        ->andWhere(['timeslot' => $timeslot])
        ->andWhere(['day' => $day])
        ->andWhere(['OR',
            ['faculty_id1' => $facultyId],
            ['faculty_id2' => $facultyId],
            ['faculty_id3' => $facultyId],
        ])
        ->andWhere(['<>', 'status', Timetable::STATUS_DELETED]) // Exclude deleted entries
        ->one();

    // If there's an existing entry, faculty is not available
    return $existingEntry === null;
}

// Action to check faculty availability
public function actionCheckFacultyAvailability()
{
    // Get parameters from the AJAX request
    $semester = Yii::$app->request->get('semester');
    $timeslot = Yii::$app->request->get('timeslot');
    $day = Yii::$app->request->get('day');
    $facultyId = Yii::$app->request->get('facultyId');

    // Implement your actual logic to check faculty availability
    $isAvailable = $this->checkFacultyAvailability($timeslot, $day, $facultyId);

    // Return the result as JSON along with a message
    $message = $isAvailable ? 'Faculty is available' : 'Faculty is not available';
    return $this->asJson(['success' => $isAvailable, 'message' => $message]);
}


    
    /**
     * Finds the Timetable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Timetable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Timetable::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
