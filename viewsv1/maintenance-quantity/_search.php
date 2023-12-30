<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceQuantitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-quantity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'maintenance_quantity_id') ?>

    <?= $form->field($model, 'maintenance_id') ?>

    <?= $form->field($model, 'raw_material_id') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
