<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\models\Faculty;
use app\models\Courses;

/* @var $this yii\web\View */
/* @var $model app\models\Facultyallotment */

$this->title = 'Courses Allotted to Faculty: ' . $model->faculty->name;
$this->params['breadcrumbs'][] = ['label' => 'Facultyallotments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="facultyallotment-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Faculty',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->faculty->name; // Assuming 'user' is the relation to the users table
                },
            ],
            [
                'label' => 'Contact',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->faculty->contact; // Assuming 'user' is the relation to the users table
                },
            ],
            [
                'label' => 'EMail',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->faculty->email; // Assuming 'user' is the relation to the users table
                },
            ],
            [
                'label' => 'Unique Id',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->faculty->staffid; // Assuming 'user' is the relation to the users table
                },
            ],
        ],
    ]) ?>

    <h2>Allotted Courses:</h2>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->faculty->getFacultyAllotments()->with('course'), // Assuming 'getFacultyAllotments' is the relation name in Faculty model
            'pagination' => false,
        ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'course.coursename',  // Assuming 'coursename' is an attribute in the Course model
            'course.coursecode', // Assuming 'course_code' is another attribute in the Course model
            'course.semester',  // Assuming 'description' is yet another attribute in the Course model
            'course.credits',  // Assuming 'description' is yet another attribute in the Course model
            'division',  // Assuming 'description' is yet another attribute in the Course model
            // Add more columns if needed
        ],
    ]); ?>

    <h2>Workload Calculation:</h2>

    <p>
        <?php
        // Example workload calculation based on assumptions
        $teachingTime = 4; // Assuming 4 hours of lectures per week
        $preparationTime = 10; // Assuming 10 hours of preparation per week
        $officeHours = 2; // Assuming 2 hours of office hours per week
        $gradingTime = 2; // Assuming 2 hours of grading per week
        $administrativeTime = 3; // Assuming 3 hours of administrative duties per week

        $totalWorkload = $teachingTime + $preparationTime + $officeHours + $gradingTime + $administrativeTime;
        ?>

        Total Workload: <?= $totalWorkload ?> hours per week
    </p>

</div>
