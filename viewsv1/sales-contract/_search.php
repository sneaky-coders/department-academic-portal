<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesContractSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-contract-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sales_contract_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'contract_no') ?>

    <?= $form->field($model, 'buyer_po_no') ?>

    <?= $form->field($model, 'buyer_id') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'product_grade_id') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'specification') ?>

    <?php // echo $form->field($model, 'units_id') ?>

    <?php // echo $form->field($model, 'destination') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'currency_id') ?>

    <?php // echo $form->field($model, 'vat') ?>

    <?php // echo $form->field($model, 'mode_of_payment') ?>

    <?php // echo $form->field($model, 'terms_of_delivery') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
