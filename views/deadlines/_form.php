<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Deadlines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deadlines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'due_date')->widget(DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <!-- Remove the following lines if you want Yii2 to handle created_at and updated_at -->
    <?= $form->field($model, 'created_at')->textInput(['type' => 'hidden'])->label(false) ?>
    <?= $form->field($model, 'updated_at')->textInput(['type' => 'hidden'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
