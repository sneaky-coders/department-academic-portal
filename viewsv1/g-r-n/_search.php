<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GRNSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grn-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'grn_id') ?>

    <?= $form->field($model, 'procurement_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'supplier_name') ?>

    <?= $form->field($model, 'po_no') ?>

    <?php // echo $form->field($model, 'raw_material') ?>

    <?php // echo $form->field($model, 'quantity_received') ?>

    <?php // echo $form->field($model, 'truck_no') ?>

    <?php // echo $form->field($model, 'driver_name') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_delete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
