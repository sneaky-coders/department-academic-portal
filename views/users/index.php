<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUsers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
    
    if(Yii::$app->user->identity->level == 1)
    {
        
        Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ;
   
    }

    ?>

 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            'username',
            //'password',
            'email:email',
            'usn',
            'batch',
            //'ismentor',
            //'hasMentor',
            'xcgpa',
            'xiicgpa',
            'bachelorcgpa',
            'sem1cgpa',
            'sem2cgpa',
            'sem3cgpa',
            'sem4cgpa',
            //'mentor_id',
            //'profile',
            //'level',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>


</div>
