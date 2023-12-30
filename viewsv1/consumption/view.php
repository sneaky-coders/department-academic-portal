<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consumption */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Consumptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="consumption-view">
<div class="text-right">
<br>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->consumption_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->consumption_id], [
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
           // 'consumption_id',
            'date',
          //  'rawMaterial.name',
            [
                'attribute' => ' raw_material_id ',
                'value' => $model->rawMaterial->name,
                'label' => 'Raw Material',
            ],
            [
                'attribute' => ' mine_location_id ',
                'value' => $model->mineLocation->name,
                'label' => 'Mine Location',
            ],
           
            'quantity',
            'cost',
         //   'created_at',
        //    'updated_at',
         //   'is_delete',
        ],
    ]) ?>
</div>
</div>
</div>
