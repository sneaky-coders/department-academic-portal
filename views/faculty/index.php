<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchFaculty */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faculties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Faculty', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        
        [
            'attribute' => 'user_id',
            'label' => 'Username', // Set the custom label here
            'value' => function ($model) {
                // Use the appropriate attribute to fetch and display the username
                return $model->user->username; // Assuming a relation with the User model
            },
        ],
        'name',
        'email:email',
        'contact',
        // ... other columns
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>



</div>
