<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceQuantity */

$this->title = 'Create Maintenance Quantity';
$this->params['breadcrumbs'][] = ['label' => 'Maintenance Quantities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-quantity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
