<?php

namespace app\controllers;

use app\models\Allotment;
use app\models\Mentor;
use app\models\SearchAllotment;
use app\models\Users;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

/**
 * AllotmentController implements the CRUD actions for Allotment model.
 */
class AllotmentController extends Controller
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
     * Lists all Allotment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchAllotment();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Add filtering rules
        $searchModel->setAttributes(Yii::$app->request->get('SearchAllotment'));

        // Other code for data provider initialization

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRandom()
    {
        $model = new Allotment();

        return $this->render('randomallotment', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Allotment model.
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
     * Creates a new Allotment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Allotment();

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Allotment model.
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
     * Deletes an existing Allotment model.
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

    /**
     * Finds the Allotment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Allotment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Allotment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

   public function actionRandomAllotment()
{
    // Retrieve all mentors for the specified batch
    $mentors = Mentor::find()->all();

    // Retrieve all mentees for the specified batch who have mentors
    $mentees = Users::find()->where(['hasMentor' => 'Yes', 'batch' => 2025])->all();

    // Calculate the number of mentors and mentees
    $numMentors = count($mentors);
    $numMentees = count($mentees);

    // Clear existing allotments for the specified batch
    Yii::$app->db->createCommand()->truncateTable('allotment')->execute();

    // Initialize counters for mentors and mentees
    $mentorIndex = 0;
    $menteeIndex = 0;

    // Iterate through available mentors and mentees and allot them
    while ($mentorIndex < $numMentors && $menteeIndex < $numMentees) {
        // Get the current mentor and mentee
        $mentor = $mentors[$mentorIndex];
        $mentee = $mentees[$menteeIndex];

        // Determine the maximum allowed mentees for mentors with specific designations
        if (in_array($mentor->designation, ['HOD', 'Dean', 'IT Head'])) {
            $allowedMentees = 4;
        } else {
            $allowedMentees = 9;  // Default for other mentors
        }

        // Check if the mentor has already reached the maximum allowed mentees
        $existingMenteesCount = Allotment::find()->where(['mentor_id' => $mentor->id])->count();
        if ($existingMenteesCount >= $allowedMentees) {
            $mentorIndex++;  // Move to the next mentor
            continue;  // Skip this mentor if they've reached their mentee limit
        }

        // Assign the mentee to the mentor
        $allotment = new Allotment();
        $allotment->mentor_id = $mentor->id;
        $allotment->mentee_id = $mentee->id;
        $allotment->save();

        // Move to the next mentee
        $menteeIndex++;
    }

    // Set a success flash message
    Yii::$app->session->setFlash('success', 'Random allotment completed successfully.');

    // Redirect to the 'index' action (adjust the URL based on your actual route)
    return $this->redirect(['index']);
}

}
