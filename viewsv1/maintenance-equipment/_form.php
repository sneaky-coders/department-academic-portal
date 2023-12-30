<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceEquipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-equipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'maintenance_id')->textInput() ?>

    <?= $form->field($model, 'equipment_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
