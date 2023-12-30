<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseContractSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-contract-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'purchase_contract_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'contract_no') ?>

    <?= $form->field($model, 'supplier_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'product_grade_id') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'specification') ?>

    <?php // echo $form->field($model, 'unit_id') ?>

    <?php // echo $form->field($model, 'mine_location_id') ?>

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
