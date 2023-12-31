<!-- views/timetable/random-timetable.php -->

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Random Timetable';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'scheme')->dropDownList(
    ['Scheme1' => 'Scheme1', 'Scheme2' => 'Scheme2'], // Replace with your actual schemes
    ['prompt' => 'Select Scheme']
) ?>

<?= $form->field($model, 'division')->dropDownList(
    ['A' => 'A', 'B' => 'B'], // Replace with your actual divisions
    ['prompt' => 'Select Division']
) ?>

<?= $form->field($model, 'semester')->dropDownList(
    ['I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'], // Replace with your actual semesters
    ['prompt' => 'Select Semester']
) ?>

<div class="form-group">
    <?= Html::submitButton('Generate Timetable', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php if ($timetable): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course</th>
                <th>Division</th>
                <th>Day</th>
                <th>Faculty</th>
                <th>Timeslot</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timetable as $entry): ?>
                <tr>
                    <td><?= Html::encode($entry['course']) ?></td>
                    <td><?= Html::encode($entry['division']) ?></td>
                    <td><?= Html::encode($entry['day']) ?></td>
                    <td><?= Html::encode($entry['faculty']) ?></td>
                    <td><?= Html::encode($entry['timeslot']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
