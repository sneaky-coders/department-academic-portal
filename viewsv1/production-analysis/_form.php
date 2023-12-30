<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductionAnalysis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="production-analysis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'component_id')->textInput() ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
