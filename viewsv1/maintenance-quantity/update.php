<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceQuantity */

$this->title = 'Update Maintenance Quantity: ' . $model->maintenance_quantity_id;
$this->params['breadcrumbs'][] = ['label' => 'Maintenance Quantities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->maintenance_quantity_id, 'url' => ['view', 'id' => $model->maintenance_quantity_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maintenance-quantity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
