<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Courses;
use app\models\Semester;
use app\models\Faculty;
use app\models\Room;
use app\models\Timeslot;
use app\models\Day;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        ArrayHelper::map(Semester::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Course']
    ) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(
        ArrayHelper::map(Courses::find()->all(), 'id', 'coursename'),
        ['prompt' => 'Select Subject']
    ) ?>

    <?= $form->field($model, 'faculty_id')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Faculty']
    ) ?>

    <?= $form->field($model, 'room_id')->dropDownList(
        ArrayHelper::map(Room::find()->all(), 'id', 'room_name'),
        ['prompt' => 'Select Room']
    ) ?>

    <?= $form->field($model, 'time_slot_id')->dropDownList(
        ArrayHelper::map(Timeslot::find()->all(), 'id', 'start_time'),
        ['prompt' => 'Select Time Slot']
    ) ?>

    <?= $form->field($model, 'day_id')->dropDownList(
        ArrayHelper::map(Day::find()->all(), 'id', 'day_name'),
        ['prompt' => 'Select Day']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
