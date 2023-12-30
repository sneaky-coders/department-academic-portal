<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseContractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Contract';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-contract-index">
<div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Purchase Contract', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'purchase_contract_id',
            'date',
            'contract_no',
            [
                'label' => 'Supplier',
                'value' => 'supplier.name',
                'attribute' => 'supplier_id',
                ],
            [
                'label' => 'Product',
                'value' => 'product.product_name',
                'attribute' => 'product_id',
                ],
            [
                'label' => 'Grade',
                'value' => 'productGrade.name',
                'attribute' => 'product_grade_id',
                ],
            
            //'size',
            //'specification:ntext',
            //'unit_id',
            // [
            //     'label' => 'Mine Location',
            //     'value' => 'mineLocation.name',
            //     'attribute' => 'mine_location_id',
            //     ],
            //'price',
            //'currency_id',
            //'vat',
            //'mode_of_payment',
            //'terms_of_delivery',
            //'created_at',
            //'updated_at',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
