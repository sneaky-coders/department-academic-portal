<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Timetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="timetable-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
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
                ],
                'options' => ['class' => 'table table-bordered detail-view'],
              
             
            ]) ?>
        </div>
        <div class="col-md-6">
    <h2>Related Information</h2>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'course_id',
                'label' => 'Course Name',
                'value' => $model->course ? $model->course->coursename : null,
            ],
            [
                'attribute' => 'subject_id',
                'label' => 'Semester',
                'value' => $model->subject ? $model->subject->semester : null,
            ],
            [
                'attribute' => 'scheme',
                'label' => 'Scheme',
                'value' => $model->scheme,
            ],

            [
                'attribute' => 'division',
                'label' => 'Division',
                'value' => $model->division,
            ],
            [
                'attribute' => 'day',
                'label' => 'Week Day',
                'value' => $model->day,
            ],
            [
                'attribute' => 'time',
                'label' => 'Time Slot',
                'value' => $model->timeslot,
            ],
          
            [
                'attribute' => 'labsession',
                'value' => function ($model) {
                    return $model->labsession ? 'Yes' : 'No';
                },
            ],
            
        ],
        'options' => ['class' => 'table table-bordered detail-view'],
        'template' => '<tr><th class="text-right">{label}</th><td>{value}</td></tr>',
    ]) ?>
</div>

    </div>
</div>
