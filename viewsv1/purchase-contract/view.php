<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\GRNSearch;
use yii\helpers\Url;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\PurchaseContract */
$searchModelgrn = new GRNSearch();
$dataProvidergrn = $searchModelgrn->search(Yii::$app->request->queryParams);
$dataProvidergrn->query->where(['purchase_contract_id' => $model->purchase_contract_id,'is_delete' => 0]);



$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Purchase Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="purchase-contract-view">
<br> 
<div class="text-right">
    <p>
    <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add GRN', ['g-r-n/save','purchase_contract_id'=> $model->purchase_contract_id,'supplier_id' =>$model->supplier_id], ['class'=>'btn btn-success']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->purchase_contract_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->purchase_contract_id], [
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
                //'purchase_contract_id',
                'date',
                'contract_no',
                [
                    'attribute' => ' supplier_name ',
                    'value' => $model->supplier->name,
                    'label' => "Supplier's Name",
                ],
                [
                    'attribute' => 'product_id',
                    'value' => $model->product->product_name,
                    'label' => 'Product',
                ],
                [
                    'attribute' => ' product_grade_id ',
                    'value' => $model->productGrade->name,
                    'label' => 'Grade',
                ],
                [
                    'attribute' => ' quantity ',
                    'value' => $model->quantity,
                    'label' => 'Order Quantity',
                ],
                'size',
              
                'specification:ntext',
                [
                    'attribute' => ' unit_id ',
                    'value' => $model->unit->name,
                    'label' => 'Unit of Measurement',
                ],
                [
                    'attribute' => ' mine_location_id ',
                    'value' => $model->mineLocation->name,
                    'label' => 'Mine Location',
                ],
                'price',
                [
                    'attribute' => ' currency_id ',
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

    <div class="col-md-6 ">
    <?php
    if ($dataProvidergrn->totalCount > 0){

        echo "<h2>GRN</h2>";
        echo GridView::widget([
            'dataProvider' => $dataProvidergrn,
            'options' => [
                'class' => 'table-responsive',
            ],
        // 'filterModel' => $searchModelComponent,
        
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            
            // 'product_component_id',
            //  'product_id',
                'date',
                'po_no',
                [
                    'label' => 'Raw Material',
                    'value' => 'rawMaterial.name',
                    'attribute' => 'raw_material_id',
                ],
               
                'quantity_received',
                'truck_no',
                //'driver_name',
                //'remark',
                
            //  'created_at',
            //  'updated_at',
        
                ['class' => 'yii\grid\ActionColumn',
            
                'template' => '{view} {leadUpdatew} {delete} ',
                'buttons' => [
                'view' => function ($url, $dataProvidergrn) {
                    $url = Url::to(['g-r-n/view','id' => $dataProvidergrn->grn_id]);
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
                },
                'leadUpdatew' => function ($url, $dataProvidergrn) {
                    $url = Url::to(['g-r-n/update','id' => $dataProvidergrn->grn_id]);
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
                },
                'delete' => function ($url, $dataProvidergrn, $key) {
                $url = Url::to(['g-r-n/delete','id' => $dataProvidergrn->grn_id]);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                    'title' => 'Delete',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                ]);
            },
                
    
            ]],
            ],
        ]);
        
        }
    ?>
    </div>
</div>
</div>
