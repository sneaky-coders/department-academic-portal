<?php

namespace app\controllers;

use Yii;
use app\models\Docs;
use app\models\SearchDocs;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DocsController implements the CRUD actions for Docs model.
 */
class DocsController extends Controller
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
     * Lists all Docs models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest)
        {
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
        $searchModel = new SearchDocs();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docs model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest)
        {
        }
        else
        {
            return $this->redirect(['/site/login']);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Docs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        

        if (!Yii::$app->user->isGuest) {
           

                $model = new Docs();

            if ($model->load(Yii::$app->request->post())) {

               
    
                $model->TT = UploadedFile::getInstance($model, 'TT');
                $model->LP = UploadedFile::getInstance($model, 'LP');
                $model->CP = UploadedFile::getInstance($model, 'CP');
                $filename = 'TT'  . '.'. $model->TT->extension;
                $filename1 = 'LP'. '.'.$model->LP->extension;
                $filename2 = 'CP'. '.'.$model->CP->extension;
                $model->TT->saveAs('uploads/' . $filename);
                $model->LP->saveAs('uploads/' . $filename1);
                $model->CP->saveAs('uploads/' . $filename2);
                $model->TT = $filename;
                $model->LP = $filename1;
                $model->CP = $filename2;
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
     * Updates an existing Docs model.
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
     * Deletes an existing Docs model.
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
     * Finds the Docs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Docs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Docs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
