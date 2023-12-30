<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\MaintenanceQuantitySearch;
use app\models\MaintenanceEquipmentSearch;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Maintenance */
$searchModel = new MaintenanceQuantitySearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->query->where(['maintenance_id' => $model->maintenance_id]);

$searchModel2 = new MaintenanceEquipmentSearch();
$dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
$dataProvider2->query->where(['maintenance_id' => $model->maintenance_id]);

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Maintenances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="maintenance-view">

<div class="text-right">
<br>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->maintenance_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->maintenance_id], [
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
                // 'maintenance_id',
                    'date',
                    [
                        'attribute' => ' mine_location_id ',
                        'value' => $model->mineLocation->name,
                        'label' => 'Mine Location',
                    ],
                    'nature_of_maintenance',
                    'type_of_maintenance',
                    'details:ntext',
                    
                    'resources_employed',
                    'other_expenses',
                    
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'maintenance_quantity_id',
            //'maintenance_id',
            [
                'label' => 'Raw Material',
                'value' => 'rawMaterial.name',
                'attribute' => 'raw_material_id',
                ],
            'quantity',
           // 'created_at',

            
        ],
    ]); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider2,
            'summary' => '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'maintenance_quantity_id',
                //'maintenance_id',
                [
                    'label' => 'Equipment',
                    'value' => 'equipment.name',
                    'attribute' => 'equipment_id',
                    ],
               // 'quantity',
            // 'created_at',

                
            ],
        ]); ?>
        </div>
    </div>
</div>
