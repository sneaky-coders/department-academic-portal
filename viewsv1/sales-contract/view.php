<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SalesContract */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Sales Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sales-contract-view">
<br>
   
    <div class="text-right">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->sales_contract_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->sales_contract_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

<div class='row'>
    <div class="col-md-6">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'sales_contract_id',
                'date',
                'contract_no',
                
                [
                    'attribute' => 'buyer_id',
                    'value' => $model->buyer->name,
                    'label' => 'Buyer',
                ],
                'buyer_po_no',
                [
                    'attribute' => 'product',
                    'value' => $model->product->product_name,
                    'label' => 'Product',
                ],
              
              //  'product_grade_id',
                [
                    'attribute' => ' product_grade_id ',
                    'value' => $model->productGrade->name,
                    'label' => 'Grade',
                ],
                [
                    'attribute' => 'quantity',
                    'value' => $model->quantity,
                    'label' => 'Order Quantity',
                ],
              
                'size',
                'specification',
                [
                    'attribute' => 'units_id',
                    'value' => $model->units->name,
                    'label' => 'Unit of Measurement',
                ],
               
                'destination:ntext',
                'price',
                [
                    'attribute' => 'currency_id',
                    'value' => $model->currency->name,
                    'label' => 'Currency',
                ],
                'vat',
                'mode_of_payment',
                'terms_of_delivery',
                //'created_at',
                //'updated_at',
                //'is_deleted',
            ],
        ]) ?>

    </div>
</div>
    
</div>
