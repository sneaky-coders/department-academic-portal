<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceQuantity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-quantity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'maintenance_id')->textInput() ?>

    <?= $form->field($model, 'raw_material_id')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
