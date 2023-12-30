<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaintenanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maintenance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-index">
<div class="row">
<br>
    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-6 text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Maintenances', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    </div>
</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'maintenance_id',
            'date',
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
                ],
            'nature_of_maintenance',
            'type_of_maintenance',
            'details:ntext',
            //'equipment:ntext',
            //'resources_employed',
            //'cost_of_maintenance',
            //'created_at',
            //'updated_at',
            //'is_delete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
