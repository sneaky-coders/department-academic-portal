<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Faculty; // Assuming your Faculty model is in the "app\models" namespace
use app\models\Courses;  // Assuming your Course model is in the "app\models" namespace

/* @var $this yii\web\View */
/* @var $model app\models\Facultyallotment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facultyallotment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faculty_id')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Faculty']
    ) ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        ArrayHelper::map(Courses::find()->all(), 'id', 'coursename'),
        ['prompt' => 'Select Course']
    ) ?>

    <?= $form->field($model, 'semster')->dropDownList(
        ['1' => 'Semester 1', '2' => 'Semester 2', '3' => 'Semester 3', '4' => 'Semester 4'],
        ['prompt' => 'Select Semester']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
