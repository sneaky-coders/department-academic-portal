<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dispatch */

//$this->title = $model->dispatch_id;
$this->params['breadcrumbs'][] = ['label' => 'Dispatches', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dispatch-view">

  <br>
   
    <div class="text-right">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->dispatch_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->dispatch_id], [
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
          //  'dispatch_id',
          'date',
            [
                'attribute' => ' mine_location_id ',
                'value' => $model->mineLocation->name,
                'label' => 'Mine Location',
            ],
            [
                'attribute' => ' sales_contract_no ',
                'value' => $model->salesContract->contract_no,
                'label' => 'Sales Contract No.',
            ],
            'quantity_dispatched',
            'quantity_received',
            'trailer_no',
            'exchange_rate',
            'type_of_dispatch',

            'truck_no',
            'driver_name',
            'driver_contact_no'
          //  'created_at',
       //     'updated_at',
         //   'is_deleted',
        ],
    ]) ?>
</div>
</div>
</div>
