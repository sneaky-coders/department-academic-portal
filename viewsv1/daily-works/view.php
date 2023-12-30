<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DailyWorks */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Daily Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="daily-works-view">
<div class="text-right">
   <br>

    <p>

        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->daily_works_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->daily_works_id], [
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
          //  'daily_works_id',
            'date',
            'nature_of_job',
            'location:ntext',
            [
                'attribute' => ' mine_location_id ',
                'value' => $model->mineLocation->name,
                'label' => 'Mine Location',
            ],
            'resources_employed:ntext',
            'distance_travelled',
            'vehicles_used',
            'cost_incurred',
         
        ],
    ]) ?>
</div>
</div>
</div>
