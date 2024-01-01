<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Users; // Assuming your model for students is Users
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Electiveenrollment */
/* @var $form yii\widgets\ActiveForm */

$students = Users::find()->where(['level' => 3])->all(); // Assuming you have a model for students with a 'level' attribute

// Create an array to store student names
$studentNames = ArrayHelper::map($students, 'user_id', 'username'); // Assuming 'username' is the attribute in your Users model representing the student's name

// Define the elective options
$electiveOptions = [
    'DevOps' => 'DevOps',
    'Artificial Intelligence' => 'Artificial Intelligence',
    'Software Project Management' => 'Software Project Management',
    'Django Framework' => 'Django Framework',
    'Machine Learning' => 'Machine Learning',
    'Cybersecurity' => 'Cybersecurity',
];

?>

<div class="elective-allocation-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <?php foreach ($students as $student): ?>
            <div class="col-md-4">
                <?= Html::label('Unique Id: ' . $student->user_id) ?>
                <?= Html::label('Student: ' . $student->username) ?>

                <?= $form->field($model, "[$student->user_id]elective1")->dropDownList(
                    $electiveOptions,
                    ['prompt' => 'Select Elective 1']
                )->label('Elective 1') ?>

                <?= $form->field($model, "[$student->user_id]elective2")->dropDownList(
                    $electiveOptions,
                    ['prompt' => 'Select Elective 2']
                )->label('Elective 2') ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
