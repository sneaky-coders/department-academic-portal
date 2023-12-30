<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MachineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Machines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machine-index">
    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Machine', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'machine_name',
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
                ],
         //   'created_at',
         //   'updated_at',
         //   'is_deleted',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => " {update} {delete}",
            ],
        ],
    ]); ?>


</div>
