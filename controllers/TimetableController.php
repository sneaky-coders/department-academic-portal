<?php

namespace app\controllers;

use Yii;
use app\models\Timetable;
use app\models\SearchTimetable;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TimetableGenerator;

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

    public function actionRandomTimetable($schemeId, $divisionId, $semesterId)
    {
        // Fetch data based on the selected scheme, division, and semester
        $courses = Courses::find()->where(['scheme_id' => $schemeId, 'division_id' => $divisionId, 'semester_id' => $semesterId])->all();
        $faculties = Faculty::find()->all();
        $rooms = Room::find()->all();

        // Generate a random timetable
        $timetable = $this->generateRandomTimetable($courses, $faculties, $rooms);

        return $this->render('random-timetable', [
            'timetable' => $timetable,
        ]);
    }

    // Function to generate a random timetable
    private function generateRandomTimetable($courses, $faculties)
    {
        $timetable = [];
    
        foreach ($courses as $course) {
            $entry = [
                'course' => $course->name,
                'division' => $course->division->name,
                'day' => $this->getRandomDay(),
                'faculty' => $this->getRandomFaculty($faculties),
                'timeslot' => $this->getRandomTimeslot(),
            ];
    
            $timetable[] = $entry;
        }
    
        return $timetable;
    }

    // Functions to get random values
    private function getRandomDay()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        return $days[array_rand($days)];
    }

    private function getRandomFaculty($faculties)
    {
        $faculty = $faculties[array_rand($faculties)];
        return $faculty->name;
    }

    private function getRandomRoom($rooms)
    {
        $room = $rooms[array_rand($rooms)];
        return $room->name;
    }

    private function getRandomTimeslot()
    {
        $timeslots = ['10:00-10:55', '11:00-11:55', '2:00-2:55', '3:00-3:55'];
        return $timeslots[array_rand($timeslots)];
    }

    public function actionGenerateRandomTimetable()
    {
        $generator = new TimetableGenerator();
        $randomTimetable = $generator->generateRandomTimetable();

        return $this->render('random-timetable', ['timetable' => $randomTimetable]);
    }

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
    public function actionCheckFacultyAvailability($semester, $timeslot, $day, $facultyId)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
    
        try {
            $isAvailable = Timetable::isFacultyAvailable($semester, $timeslot, $day, $facultyId);
            Yii::info('Faculty availability check successful', 'timetable');
            return ['success' => $isAvailable];
        } catch (\Exception $e) {
            Yii::error('Error in faculty availability check: ' . $e->getMessage(), 'timetable');
            return ['success' => false, 'error' => $e->getMessage()];
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
