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
                    return $model->faculty->name; // Assuming 'user' is the relation to the users table
                },
            ],
            [
                'label' => 'Course',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->course->coursename; // Assuming 'user' is the relation to the users table
                },
            ],
            [
                'label' => 'Course COde',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->course->coursecode; // Assuming 'user' is the relation to the users table
                },
            ],
            'semster',
            [
                'label' => 'Credits',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->course->credits; // Assuming 'user' is the relation to the users table
                },
            ],
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
