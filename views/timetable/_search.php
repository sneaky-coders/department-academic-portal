<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchTimetable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'timetable_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'faculty_id') ?>

    <?= $form->field($model, 'room_id') ?>

    <?php // echo $form->field($model, 'timeslot') ?>

    <?php // echo $form->field($model, 'day_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
