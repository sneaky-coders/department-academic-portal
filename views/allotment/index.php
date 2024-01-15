<?php

use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAllotment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Allotments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allotment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Perform Random Allotment', ['random-allotment'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Student Name',
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->mentee->username;  // Assuming 'user' is the relation to the users table
                },
            ],
            [
                'label' => 'Mentor Name',
                'attribute' => 'mentor_id',
                'value' => function ($model) {
                    return $model->mentor->name;  // Assuming 'user' is the relation to the users table
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ];

        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'clearBuffers' => true,  // optional
            'filename' => 'Mentee Allotment' . date('dd-MM-yy')
        ]);
    ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,  // Assign the search model to enable filtering
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        [
            'label' => 'Mentor Name',
            'attribute' => 'mentor_id',
            'value' => function ($model) {
                return $model->mentor->name;  // Assuming 'user' is the relation to the users table
            },
        ],
        [
            'label' => 'Student Name',
            'attribute' => 'user_id',
            'value' => function ($model) {
                return $model->mentee->username;  // Assuming 'user' is the relation to the users table
            },
            'filter' => Html::textInput('SearchAllotment[user_id]', $searchModel->user_id, ['class' => 'form-control']),
        ],
        [
            'label' => 'CGPA',
            'attribute' => 'bachelorcgpa',
            'value' => function ($model) {
                return $model->mentee->bachelorcgpa;  // Assuming 'user' is the relation to the users table
            },
            'filter' => Html::textInput('SearchAllotment[bachelorcgpa]', $searchModel->bachelorcgpa, ['class' => 'form-control']),
        ],
        [
            'label' => 'Batch',
            'attribute' => 'batch',
            'value' => function ($model) {
                return $model->mentee->batch;  // Assuming 'user' is the relation to the users table
            },
            'filter' => Html::textInput('SearchAllotment[bachelorcgpa]', $searchModel->bachelorcgpa, ['class' => 'form-control']),
        ],
        'created_at',
        'updated_at',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>


</div>
