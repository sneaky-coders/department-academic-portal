<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MineLocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mine Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mine-location-index">
<div class="row">
<div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Mine Location', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>
</div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'mine_location_id',
            'name',
            'address:ntext',
         //   'created_at',
         //   'updated_at',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn',
            'template' => " {update} {delete}",
        ],
        ],
    ]); ?>


</div>
