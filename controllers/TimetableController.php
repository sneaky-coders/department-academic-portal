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
use app\models\Faculty;
use app\models\Courses;

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
    
        if (!$model->load(Yii::$app->request->post())) {
            return $this->render('create', ['model' => $model]);
        }
    
        // Check if a record already exists for the specified day, time, and faculty
        if ($this->checkRecordExists($model->timeslot, $model->day, $model->faculty_id1)
            || $this->checkRecordExists($model->timeslot, $model->day, $model->faculty_id2)
            || $this->checkRecordExists($model->timeslot, $model->day, $model->faculty_id3)) {
    
            $facultyName = $this->getFacultyName($model->faculty_id1);
            Yii::$app->session->setFlash('error', "A record already exists for $facultyName in the selected timeslot, day, and faculty.");
            return $this->render('create', ['model' => $model]);
        }
    
        // Check faculty availability before saving
        if (!$this->checkFacultyAvailability($model->timeslot, $model->day, $model->faculty_id1)
            || !$this->checkFacultyAvailability($model->timeslot, $model->day, $model->faculty_id2)
            || !$this->checkFacultyAvailability($model->timeslot, $model->day, $model->faculty_id3)) {
    
            $facultyName = $this->getFacultyName($model->faculty_id1);
            $semester = $model->semester;
            $time = $model->timeslot;
            Yii::$app->session->setFlash('error', "Faculty $facultyName is not available in the selected timeslot ($time) and day for semester $semester.");
            return $this->render('create', ['model' => $model]);
        }
    
        // Save the model if everything is okay
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    
        // Handle the case where saving the model fails
        Yii::$app->session->setFlash('error', 'An error occurred while saving the timetable entry.');
        return $this->render('create', ['model' => $model]);
    }
    
    // Helper method to get faculty name by ID
    private function getFacultyName($facultyId)
    {
        $faculty = Faculty::findOne($facultyId);
        return $faculty ? $faculty->name : 'Unknown Faculty';
    }
    
    private function checkRecordExists($timeslot, $day, $facultyId)
    {
        return Timetable::find()
            ->andWhere(['timeslot' => $timeslot, 'day' => $day])
            ->andWhere(['OR', ['faculty_id1' => $facultyId], ['faculty_id2' => $facultyId], ['faculty_id3' => $facultyId]])
            ->exists();
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

// Action to check faculty availability
public function actionCheckFacultyAvailability()
{
    // Get parameters from the AJAX request
    $timeslot = Yii::$app->request->get('timeslot');
    $day = Yii::$app->request->get('day');
    $facultyId = Yii::$app->request->get('facultyId');

    // Implement your actual logic to check faculty availability
    $isAvailable = $this->checkFacultyAvailability($timeslot, $day, $facultyId);

    // Get faculty name
    $facultyName = $this->getFacultyName($facultyId);

    // Return the result as JSON along with a message
    $message = $isAvailable
        ? "Faculty $facultyName is available for timeslot $timeslot and day $day."
        : "Faculty $facultyName is not available for timeslot $timeslot and day $day.";

    return $this->asJson(['success' => $isAvailable, 'message' => $message]);
}

private function checkFacultyAvailability($timeslot, $day, $facultyId)
{
    // Query the database to check if the faculty is already assigned to another class on the same day and timeslot
    $existingEntry = Timetable::find()
        ->andWhere(['timeslot' => $timeslot, 'day' => $day])
        ->andWhere(['OR',
            ['faculty_id1' => $facultyId],
            ['faculty_id2' => $facultyId],
            ['faculty_id3' => $facultyId],
        ])
        ->one();

    // If there's an existing entry, faculty is not available
    return $existingEntry === null;
}


private function generateRandomTimetable()
    {
        // Fetch courses and faculties
        $courses = Courses::find()->all();
        $faculties = Faculty::find()->all();

        // Iterate through courses
        foreach ($courses as $course) {
            $classesPerWeek = $this->calculateClassesPerWeek($course->credits);

            $morningClasses = (int) ($classesPerWeek * 0.6);
            $afternoonClasses = $classesPerWeek - $morningClasses;

            // Iterate through morning classes
            for ($i = 0; $i < $morningClasses; $i++) {
                $this->allocateFaculty($course, 'morning', $faculties, RandomTimetable::class);
            }

            // Iterate through afternoon classes
            for ($i = 0; $i < $afternoonClasses; $i++) {
                $this->allocateFaculty($course, 'afternoon', $faculties, RandomTimetable::class);
            }
        }
    }

    /**
     * Method to allocate faculty for a course and store it in the specified table.
     */
    private function allocateFaculty($course, $timeSlot, &$faculties, $tableName)
    {
        if (!empty($faculties)) {
            $faculty = array_shift($faculties);

            // Use the specified table name (RandomTimetable) to create an instance
            $randomTimetableEntry = new $tableName([
                'course_id' => $course->id,
                'faculty_id' => $faculty->id,
                'time_slot' => $timeSlot,
                // Add other attributes as needed
            ]);

            // Save the entry to the specified table
            $randomTimetableEntry->save();
        }
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
