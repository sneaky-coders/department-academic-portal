<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'operation_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'particular') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'cost_of_machine_operation') ?>

    <?php // echo $form->field($model, 'diesel_cost') ?>

    <?php // echo $form->field($model, 'oil_cost') ?>

    <?php // echo $form->field($model, 'other_costs') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
