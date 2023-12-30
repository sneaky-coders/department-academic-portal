<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperationData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'operation_data_id')->textInput() ?>

    <?= $form->field($model, 'operation_id')->textInput() ?>

    <?= $form->field($model, 'machine_id')->textInput() ?>

    <?= $form->field($model, 'hours')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
