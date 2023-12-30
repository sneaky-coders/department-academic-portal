<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GRN */

$this->title = $model->date;
//$this->params['breadcrumbs'][] = ['label' => 'Grns', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grn-view">
<br>
<div class="text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->grn_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->grn_id], [
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
                // 'grn_id',
                
                [
                    'attribute' => ' purchase_contract_id ',
                    'value' => $model->purchaseContract->contract_no,
                    'label' => 'Purchse Contract No.',
                ],
                'date',
                [
                    'attribute' => ' supplier_name ',
                    'value' => $model->supplier->name,
                    'label' => 'Supplier Name',
                ],
                'po_no',
                [
                    'attribute' => ' raw_material_id ',
                    'value' => $model->rawMaterial->name,
                    'label' => 'Mine Location',
                ],
                'quantity_received',
                'exchange_rate',
                'truck_no',
                'driver_name',
                'remark:ntext',
                // 'created_at',
                // 'updated_at',
                // 'is_delete',
            ],
        ]) ?>
    </div>
</div>
    

</div>
