<?php

namespace app\controllers;

use Yii;
use app\models\Internship;
use app\models\SearchInternship;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Users;
use app\models\SearchUsers;
use yii\data\ActiveDataProvider;

/**
 * InternshipController implements the CRUD actions for Internship model.
 */
class InternshipController extends Controller
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
     * Lists all Internship models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            if(Yii::$app->user->identity->level == 2)
            {
                $usn = Yii::$app->user->identity->mentor_id;
                $searchModel = new SearchUsers();
                $query = Internship::find()->where(['mentor_id' => $usn]);
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'sort' => [
                        'defaultOrder' => [
                           
                            
                            
                            
                        ]
                    ],
                ]);
                
               
      
                $query->andFilterWhere(['mentor_id' => $usn]);
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    
                    'mentor_id' => $usn
                ]);
            }
            

            if(Yii::$app->user->identity->level == 1)
            {
                $searchModel = new SearchInternship();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

            }
           
        }else{
            return $this->redirect(['/site/login']);
        } 
    }

    /**
     * Displays a single Internship model.
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
     * Creates a new Internship model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        

        if (!Yii::$app->user->isGuest) {
           

                $model = new Internship();

            if ($model->load(Yii::$app->request->post())) {

                $usn = Yii::$app->user->identity->usn;
    
                $model->certificate = UploadedFile::getInstance($model, 'certificate');
                $filename = 'Internship'.$usn . '.' . $model->certificate->extension;
                $model->certificate->saveAs('uploads/' . $filename);
                $model->certificate = $filename;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
    
            return $this->render('create', [
                'model' => $model,
            ]);
         }else {
            return $this->redirect(['/site/login']);
        }

    }

    /**
     * Updates an existing Internship model.
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
     * Deletes an existing Internship model.
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
     * Finds the Internship model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Internship the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Internship::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
