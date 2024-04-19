<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchInternship */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Internships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="internship-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Internship', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => "Student Name",
                'attribute' => 'student_name',
                'value' => 'user.username'
            ],
            [
                'label' => "Mentor",
                'attribute' => 'mentor_name',
                'value' => 'mentor.name'
            ],
            'company',
            'startdate',
            'enddate',
            'hours',
            [
            'attribute'=>'certificate',
            'format'=>'raw',
            'value' => function($data)
            {
            return
            Html::a('Download file', ['/uploads/'.$data->certificate, 'id' => $data->id,'certificate' => $data->certificate],['class' => 'btn btn-primary','target'=>'_blank']);
    
            }
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

