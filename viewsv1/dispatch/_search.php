<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DispatchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispatch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dispatch_id') ?>

    <?= $form->field($model, 'mine_location_id') ?>

    <?= $form->field($model, 'sales_contract_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'quantity_dispatched') ?>

    <?php // echo $form->field($model, 'quantity_received') ?>

    <?php // echo $form->field($model, 'exchange_rate') ?>

    <?php // echo $form->field($model, 'type_of_dispatch') ?>

    <?php // echo $form->field($model, 'po_no') ?>

    <?php // echo $form->field($model, 'truck_no') ?>

    <?php // echo $form->field($model, 'driver_name') ?>

    <?php // echo $form->field($model, 'driver_contact_no') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
