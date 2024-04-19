<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchFacultyallotment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facultyallotments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facultyallotment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Facultyallotment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        [
            'label' => 'Faculty',
            'attribute' => 'user_id',
            'value' => function ($model) {
                return $model->faculty->name ?? 'N/A'; // Use 'N/A' or another default value if faculty is null
            },
        ],
        [
            'label' => 'Course',
            'attribute' => 'user_id',
            'value' => function ($model) {
                return $model->course->coursename ?? 'N/A'; // Use 'N/A' or another default value if course is null
            },
        ],
        [
            'label' => 'Course Code',
            'attribute' => 'user_id',
            'value' => function ($model) {
                return $model->course->coursecode ?? 'N/A'; // Use 'N/A' or another default value if course is null
            },
        ],
        'semster',
        'division',
        [
            'label' => 'Credits',
            'value' => function ($model) {
                return $model->course->credits ?? 'N/A'; // Use 'N/A' or another default value if credits is null
            },
        ],
        [
            'attribute' => 'created_at',
            'format' => ['datetime', 'php:Y-m-d H:i:s'], // Adjust the format as needed
        ],
        // ... (existing code)
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

</div>
