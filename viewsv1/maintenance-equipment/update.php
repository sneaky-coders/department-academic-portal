<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceEquipment */

$this->title = 'Update Maintenance Equipment: ' . $model->maintenance_equipment_id;
$this->params['breadcrumbs'][] = ['label' => 'Maintenance Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->maintenance_equipment_id, 'url' => ['view', 'id' => $model->maintenance_equipment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maintenance-equipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
