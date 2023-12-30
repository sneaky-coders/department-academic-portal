<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsumablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consumables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumables-index">
    <div class="row">
    <br>
        <div class="col-md-6">

        <h1><?= Html::encode($this->title) ?></h1>
        </div>

        <div class="col-md-6 text-right">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Consumables Receipt', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'consumables_id',
            'date',
            [
                'label' => 'Supplier',
                'value' => 'supplier.name',
                'attribute' => 'supplier_id',
            ],
            [
                'label' => 'Raw Material',
                'value' => 'rawMaterial.name',
                'attribute' => 'raw_material_id',
            ],
            //'currency_id',
            'price',
            //'vat',
            'quantity',
            //'units_id',
            //'remarks:ntext',
            //'created_at',
            //'updated_at',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
