<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\FacultyAllotment; // Import the FacultyAllotment model

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchRandomtimetable */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Randomtimetables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="randomtimetable-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Generate Random Timetable', ['generate-random-timetable'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete All Records', ['delete-all-records'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete all records?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'course_id',
            'semester',
            'subject_id',
            'scheme',
            'division',
            'labsession',
            'faculty_id1',
            'faculty_id2',
            'faculty_id3', 
            'room',
            'timeslot',
            'day',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
