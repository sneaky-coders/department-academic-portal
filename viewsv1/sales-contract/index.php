<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesContractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Contract';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-contract-index">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Sales Contract', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>
  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'sales_contract_id',
            'date',
            'contract_no',
            'buyer_po_no',
            [
                'label' => 'Buyer',
                'value' => 'buyer.name',
                'attribute' => 'buyer_id',
                ],
            [
                'label' => 'Product',
                'value' => 'product.product_name',
                'attribute' => 'product_id',
                ],
            // [
            //     'label' => 'Grade',
            //     'value' => 'productGrade.name',
            //     'attribute' => 'product_grade_id',
            //     ],
            
            //'size',
            //'specification',
            //'units_id',
            //'destination:ntext',
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
