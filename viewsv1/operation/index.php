<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add Daily Operations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-index">
<br>
<div class="row">
    <div class="col-md-6">
    <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-6 text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add Daily Operations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
</div>
   

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'operation_id',
            'date',
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
                ],
                // [
                //     'label' => 'Particulars',
                //     'value' => 'machine.machine_name',
                //     'attribute' => 'machine_id',
                //     ],
           
            // 'quantity',
            // 'cost_of_machine_operation',
           // 'diesel_cost',
           // 'oil_cost',
            'other_costs',
            //'created_at',
            //'updated_at',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
