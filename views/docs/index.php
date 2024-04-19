<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchDocs */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Docs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'TT',
                'format'=>'raw',
                'label' => 'Time Table',
                'value' => function($data)
                {
                return
                Html::a('Download Time Table', ['/uploads/'.$data->TT, 'id' => $data->id,'TT' => $data->TT],['class' => 'btn btn-primary','target'=>'_blank']);
        
                }
                ],
                [
                'attribute'=>'LP',
                'format'=>'raw',
                'label' => 'Lecture Plan',
                'value' => function($data)
                {
                return
                Html::a('Download LP', ['/uploads/'.$data->LP, 'id' => $data->id,'LP' => $data->LP],['class' => 'btn btn-primary','target'=>'_blank']);
        
                }
                ],
                [
                'attribute'=>'CP',
                'format'=>'raw',
                'label' => 'Course Documents',
                'value' => function($data)
                {
                return
                Html::a('Download CP', ['/uploads/'.$data->CP, 'id' => $data->id,'CP' => $data->CP],['class' => 'btn btn-primary','target'=>'_blank']);
        
                }
                ],
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
