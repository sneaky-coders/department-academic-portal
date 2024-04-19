<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchElectiveenrollment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Electiveenrollments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electiveenrollment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Electiveenrollment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'label' => 'Student Name',
        'attribute' => 'user_id',
        'value' => function ($model) {
            return $model->user->username; // Assuming 'user' is the relation to the users table
        },
    ],
    'elective1',
    'elective2',
    ['class' => 'yii\grid\ActionColumn'],
];
    
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'clearBuffers' => true, //optional
        'filename' => 'Elective Enrollment'.date('dd-MM-yy')
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Student Name',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->username; // Assuming 'user' is the relation to the users table
                },
            ],
            'elective1',
            'elective2',
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
