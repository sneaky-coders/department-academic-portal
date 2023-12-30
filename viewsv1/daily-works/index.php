<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DailyWorksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daily Works/Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daily-works-index">

    
<div class="row">
<br>
    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-6 text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Daily Works/Jobs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'daily_works_id',
            'date',
            'nature_of_job',
            'location:ntext',
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
                ],
            //'resources_employed:ntext',
            //'distance_travelled',
            //'vehicles_used',
            //'cost_incurred',
            //'created_at',
            //'updated_at',
            //'is_delete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
