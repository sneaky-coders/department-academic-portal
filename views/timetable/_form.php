<!-- views/timetable/create.php -->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Courses;
use app\models\Faculty;

$this->title = 'Create Timetable Entry';
$this->params['breadcrumbs'][] = ['label' => 'Timetable', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

// Include jQuery
$this->registerJsFile('https://code.jquery.com/jquery-3.6.4.min.js', ['position' => \yii\web\View::POS_HEAD]);

// Registering JavaScript
$this->registerJs("
    var labSessionCheckbox = $('#" . Html::getInputId($model, 'labsession') . "');
    var facultyFields = $('#" . Html::getInputId($model, 'faculty_id2') . ", #" . Html::getInputId($model, 'faculty_id3') . "');
    var facultyLabels = $('label[for=\"" . Html::getInputId($model, 'faculty_id2') . '"], label[for="' . Html::getInputId($model, 'faculty_id3') . "\"]');
    var elective2Field = $('#" . Html::getInputId($model, 'elective2Field') . "');
    var subjectDetails = $('#" . Html::getInputId($model, 'subjectDetails') . "');
    var courseDropdown = $('#" . Html::getInputId($model, 'course_id') . "');
    var semesterInput = $('#" . Html::getInputId($model, 'semester') . "');

    facultyFields.hide();
    facultyLabels.css('display', 'none');
    elective2Field.hide();
    subjectDetails.hide();

    labSessionCheckbox.change(updateVisibility);

    function updateVisibility() {
        if (labSessionCheckbox.prop('checked')) {
            facultyFields.show();
            facultyLabels.css('display', '');
        } else {
            facultyFields.hide();
            facultyLabels.css('display', 'none');
        }
    }

    updateVisibility();

    // Update semester input based on the selected course
    courseDropdown.change(function() {
        var selectedCourse = courseDropdown.val();
        // Assuming you have a mapping of courses to semesters, replace this with your logic
        var courseSemesterMapping = " . json_encode(['1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV']) . ";

        // Set the value of the semester input
        semesterInput.val(courseSemesterMapping[selectedCourse] || '');
    });

    // Validate form before submission
    $('#timetable-form').submit(function(event) {
        // Check if faculties are already allocated in the same timeslot and day
        var selectedSemester = semesterInput.val();
        var selectedTimeslot = $('#" . Html::getInputId($model, 'timeslot') . "').val();
        var selectedDay = $('#" . Html::getInputId($model, 'day') . "').val();
        var faculty1 = $('#" . Html::getInputId($model, 'faculty_id1') . "').val();
        var faculty2 = $('#" . Html::getInputId($model, 'faculty_id2') . "').val();
        var faculty3 = $('#" . Html::getInputId($model, 'faculty_id3') . "').val();

        // Prevent form submission if any faculty is not available
        if (!checkFacultyAvailability(selectedSemester, selectedTimeslot, selectedDay, faculty1)) {
            alertFacultyNotAvailable(faculty1);
            event.preventDefault(); // Prevent form submission
            return false;
        }

        if (!checkFacultyAvailability(selectedSemester, selectedTimeslot, selectedDay, faculty2)) {
            alertFacultyNotAvailable(faculty2);
            event.preventDefault(); // Prevent form submission
            return false;
        }

        if (!checkFacultyAvailability(selectedSemester, selectedTimeslot, selectedDay, faculty3)) {
            alertFacultyNotAvailable(faculty3);
            event.preventDefault(); // Prevent form submission
            return false;
        }

        return true; // Allow form submission if everything is valid
    });

    // Function to check faculty availability using AJAX
    function checkFacultyAvailability(semester, timeslot, day, facultyId) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                method: 'GET',
                url: '" . Yii::$app->urlManager->createUrl(['/timetable/check-faculty-availability']) . "',
                data: { semester: semester, timeslot: timeslot, day: day, facultyId: facultyId },
                success: function(response) {
                    resolve(response.success);
                },
                error: function (error) {
                    reject(error);
                }
            });
        });
    }
    
    // Example of using the function with a promise
    checkFacultyAvailability('II', '10:00-10:55', 'Friday', 2)
        .then(function (isAvailable) {
            if (isAvailable) {
                // Faculty is available
                console.log('Faculty is available');
            } else {
                // Faculty is not available
                console.log('Faculty is not available');
            }
        })
        .catch(function (error) {
            console.error('Error checking faculty availability:', error);
        });
    

    // Function to alert faculty not available
    function alertFacultyNotAvailable(facultyId) {
        var facultyName = getFacultyName(facultyId);
        alert(facultyName + ' is not available in the selected timeslot and day!');
    }

    // Function to get faculty name by ID
    function getFacultyName(facultyId) {
        var facultyName = '';
        var facultyList = " . json_encode(ArrayHelper::map(Faculty::find()->all(), 'id', 'name')) . ";

        if (facultyList[facultyId]) {
            facultyName = facultyList[facultyId];
        }

        return facultyName;
    }
");
?>

<!-- Rest of your HTML code remains unchanged -->

<h1><?= Html::encode($this->title) ?></h1>

<div class="timetable-form">
    <?php $form = ActiveForm::begin([
        'options' => ['id' => 'timetable-form'],
    ]); ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        ['1' => '1', '2' => '2', '3' => '3', '4' => '4'],
        ['prompt' => 'Select Semester']
    ) ?>

    <?= $form->field($model, 'semester')->hiddenInput()->label('') ?>

    <?= $form->field($model, 'labsession')->checkbox() ?>

    <?= $form->field($model, 'faculty_id1')->label('Faculty 1')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Faculty']
    ) ?>

    <?= $form->field($model, 'faculty_id2')->label('Faculty 2')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Faculty']
    ) ?>

    <?= $form->field($model, 'faculty_id3')->label('Faculty 3')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Faculty']
    ) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(
        ArrayHelper::map(Courses::find()->all(), 'id', 'coursename'),
        ['prompt' => 'Select Course']
    ) ?>

    <?= $form->field($model, 'division')->dropDownList(
        [
            'A' => 'A',
            'B' => 'B',
        ],
        ['prompt' => 'Select Division']
    ) ?>

    <?= $form->field($model, 'room')->dropDownList(
        ['DS-1' => 'DS-1', 'DS-2' => 'DS-2', 'DS-3' => 'DS-3', 'DS-4' => 'DS-4', 'Lab 2' => 'Lab 2', 'Lab 6' => 'Lab 6', 'Big Data Lab' => 'Big Data Lab'],
        ['prompt' => 'Select Room']
    ) ?>

    <?= $form->field($model, 'timeslot')->dropDownList(
        ['10:00-10:55' => '10:00-10:55', '10:55-11:50' => '10:55-11:50', '11:50-12:45' => '11:50-12:45', '1:00-1:55' => '1:00-1:55', '2:30-4:30' => '2:30-4:30', '2:30-3:25' => '2:30-3:25', '2:30-5:00' => '2:30-5:00', '1:00-3:00' => '1:00-3:00', '3:30-4:25' => '3:30-4:25', '3:30-5:00' => '3:30-5:00'],
        ['prompt' => 'Select Time Slot']
    ) ?>

    <?= $form->field($model, 'day')->dropDownList(
        [
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday',
        ],
        ['prompt' => 'Select Day']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
