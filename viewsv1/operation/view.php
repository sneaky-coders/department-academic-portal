<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\models\OperationDataSearch;
$searchModel = new OperationDataSearch();
$OperationDataSearch = $searchModel->search(Yii::$app->request->queryParams);
$OperationDataSearch->query->where(['operation_id' => $model->operation_id]);
/* @var $this yii\web\View */
/* @var $model app\models\Operation */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Operations', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="operation-view">

<div class="text-right">
<br>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->operation_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->operation_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>  

    <div class="row">
            
        <div class="col-md-6">
                <?= DetailView::widget([
            'model' => $model,
            
            'attributes' => [
                //'operation_id',
                'date',
                
                [
                    'attribute' => ' mine_location_id ',
                    'value' => $model->mineLocation->name,
                    'label' => 'Mine Location',
                ],
                //'quantity',
                // 'cost_of_machine_operation',
                //'diesel_cost',
                //'oil_cost',
                'other_costs',
                //'created_at',
                //'updated_at',
                //'is_deleted',
            ],
        ]) ?>
        <?=  GridView::widget([
            'dataProvider' => $OperationDataSearch,
            'summary' => '',
            'columns' => [
                
                ['class' => 'yii\grid\SerialColumn'],

                // 'operation_data_id',
                //'operation_id',
                'machine.machine_name',
                //'hours',
                [
                    'label' => 'Hours of Operation',
                    'value' => 'hours',
                    'attribute' => 'hours',
                    ],
                [
                    'label' => 'Machine Cost',
                    'value' => 'cost_of_machine_operation',
                    'attribute' => 'cost_of_machine_operation',
                    ],
               // 'cost_of_machine_operation'
                //'created_at',
                //'updated_at',

    
            ],
            ]); 
        ?>
        



        </div>


       
    </div> 
</div>
