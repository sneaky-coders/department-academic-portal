<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DispatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dispatch';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispatch-index">

  
<div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Dispatch', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           'date',
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
            ],
            [
                'label' => 'Sales Contract No.',
                'value' => 'salesContract.contract_no',
                'attribute' => 'sales_contract_id',
            ],
           //'quantity_dispatched',
            //'quantity_received',

            //'exchange_rate',
            'type_of_dispatch',
           // 'po_no',
           // 'truck_no',
            //'driver_name',
            //'driver_contact_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
