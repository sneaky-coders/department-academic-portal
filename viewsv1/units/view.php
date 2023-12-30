<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Units */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="units-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="text-right">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->unit_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->unit_id], [
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
          //  'unit_id',
            'name',
         //   'is_deleted',
         //   'created_at',
          //  'updated_at',
        ],
    ]) ?>
</div>
</div>
</div>
