<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'semester')->dropDownList(
        ['1' => 'Semester 1', '2' => 'Semester 2', '3' => 'Semester 3', '4' => 'Semester 4'],
        ['prompt' => 'Select Semester']
    ) ?>

    <?= $form->field($model, 'coursename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coursecode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credits')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
