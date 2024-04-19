<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchCertificationcourse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Certificationcourses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificationcourse-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Certificationcourse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'score',
            'marks',
            [
                'attribute'=>'certificate',
                'format'=>'raw',
                'label' => 'Completion Certificate',
                'value' => function($data)
                {
                return
                Html::a('Download Course', ['/uploads/'.$data->certificate, 'id' => $data->id,'certificate' => $data->certificate],['class' => 'btn btn-primary','target'=>'_blank']);
        
                }
                ],
                [
                    'attribute'=>'certificate1',
                    'label' => 'Score Certificate',
                    'format'=>'raw',
                    'value' => function($data)
                    {
                    return
                    Html::a('Download Grade', ['/uploads/'.$data->certificate1, 'id' => $data->id,'certificate1' => $data->certificate],['class' => 'btn btn-primary','target'=>'_blank']);
            
                    }
                    ],
            //'created_at',
            //'updated_at',
            //'user_id',
            //'mentor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
