<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consumables */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Consumables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="consumables-view">

<br>
<div class='text-right'>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->consumables_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->consumables_id], [
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
              //  'consumables_id',
                'date',
                [
                    'attribute' => 'supplier_id',
                    'value' => $model->supplier->name,
                    'label' => 'Supplier',
                ],
                [
                    'attribute' => 'raw_material_id',
                    'value' => $model->rawMaterial->name,
                    'label' => 'Raw Material',
                ],
                [
                    'attribute' => 'currency_id',
                    'value' => $model->currency->name,
                    'label' => 'Currency',
                ],
                'price',
                'vat',
                'quantity',
                [
                    'attribute' => 'units_id',
                    'value' => $model->units->name,
                    'label' => 'Unit of Measurement',
                ],
                'remarks:ntext',
              //  'created_at',
              //  'updated_at',
              //  'is_deleted',
            ],
        ]) ?>
    </div>
</div>
</div>
