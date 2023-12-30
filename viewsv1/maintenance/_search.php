<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaintenanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'maintenance_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'mine_location') ?>

    <?= $form->field($model, 'nature_of_maintenance') ?>

    <?= $form->field($model, 'type_of_maintenance') ?>

    <?php // echo $form->field($model, 'details') ?>

    <?php // echo $form->field($model, 'equipment') ?>

    <?php // echo $form->field($model, 'resources_employed') ?>

    <?php // echo $form->field($model, 'cost_of_maintenance') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_delete') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
