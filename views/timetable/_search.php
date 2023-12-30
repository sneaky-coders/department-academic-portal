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

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'labsession') ?>

    <?= $form->field($model, 'faculty_id1') ?>

    <?php // echo $form->field($model, 'faculty_id2') ?>

    <?php // echo $form->field($model, 'faculty_id3') ?>

    <?php // echo $form->field($model, 'room') ?>

    <?php // echo $form->field($model, 'timeslot') ?>

    <?php // echo $form->field($model, 'day') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
