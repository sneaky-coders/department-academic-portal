<!-- views/timetable/index.php -->

<?php

use yii\helpers\Html;
use app\models\Courses;
use app\models\Faculty;

$this->title = 'Timetable';
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css" media="print">
    /* CSS styles for printing */
    body {
        font-size: 10px; /* Adjust font size for printing */
    }
    .table-responsive {
        overflow: visible !important;
    }
</style>

<h1><?= Html::encode($this->title) ?></h1>

<?php
$semester = '1';  // Set the desired semester
$division = 'A';   // Set the desired division

$this->params['breadcrumbs'][] = ['label' => 'Sem'.$semester . ' Division ' . $division, 'url' => ['/timetable/index']];

echo "<div class='header'>";
echo "<h2>Sem :{$semester} Div - {$division}</h2>";
echo "</div>";

// If there is no timetable data, display a message
if (empty($timetableData)) {
    echo "<p>No timetable entries available.</p>";
} else {
    // Group timetable entries by day and timeslot
    $groupedTimetable = [];
    $allTimeslots = [];
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

    foreach ($timetableData as $entry) {
        $day = $entry->day;
        $timeslot = $entry->timeslot;

        $groupedTimetable[$day][$timeslot][] = $entry;
        $allTimeslots[$timeslot] = true;
    }

    // Hardcoded tea break entry for Monday from 12:45pm to 1:00pm
    $teaBreakDay = 'Monday';
    $teaBreakTimeslot = '12:45pm - 1:00pm';
    $teaBreakRoom = 'Tea Break Room';

    // Hardcoded lunch break entry for Monday from 3:00pm to 3:30pm
    $lunchBreakDay = 'Monday';
    $lunchBreakTimeslot = '3:00pm - 3:30pm';
    $lunchBreakRoom = 'Lunch Break Room';

    // Sort timeslots in the desired order
    $sortedTimeslots = array_keys($allTimeslots);
    usort($sortedTimeslots, function ($a, $b) {
        $format = 'h:ia'; // Format of timeslots, adjust as needed
        $timeA = DateTime::createFromFormat($format, $a);
        $timeB = DateTime::createFromFormat($format, $b);

        return $timeA <=> $timeB;
    });

    echo "<div class='table-responsive'>"; // Make the table responsive

    echo "<table class='table table-bordered table-striped' style='max-height: 500px;'>"; // Set max height for the table

    // Display header row with timeslots and days
    echo "<thead><tr>";
    echo "<th colspan='" . (count($sortedTimeslots) + 1) . "' class='text-center'>Sem {$semester} Div - {$division}</th>"; // Span across all timeslots
    echo "</tr><tr>"; // Add a new row

    echo "<th>Day/Time Slot</th>";

    // Display sorted timeslots
    foreach ($sortedTimeslots as $timeslot) {
        echo "<th>{$timeslot}</th>";
    }

    echo "</tr></thead>";

    // Display rows for each day
    echo "<tbody>";
    foreach ($days as $day) {
        echo "<tr>";
        echo "<th>{$day}</th>"; // Display day in th

        foreach ($sortedTimeslots as $timeslot) {
            echo "<td>";

            // Check if entries exist for this day and timeslot
            if (isset($groupedTimetable[$day][$timeslot])) {
                // Display entries for each timeslot
                foreach ($groupedTimetable[$day][$timeslot] as $entry) {
                    // Fetch related models for additional details
                    $courseModel = Courses::findOne($entry->course_id);

                    if ($courseModel) {
                        // Display additional details
                        echo "<p>";
                        echo Html::encode("Course: {$courseModel->coursename}") . "<br>";
                        echo Html::encode("Course Code: {$courseModel->coursecode}") . "<br>";
                        echo Html::encode("Semester: {$courseModel->semester}") . "<br>";

                        // Display faculty details
                        echo "Faculty 1: " . ($entry->faculty_id1 ? Faculty::findOne($entry->faculty_id1)->name : 'N/A') . "<br>";
                       

                        echo Html::encode("Room: {$entry->room}") . "<br>";
                        echo "</p>";
                    }
                }
            } elseif ($day === $teaBreakDay && $timeslot === $teaBreakTimeslot) {
                // Display tea break entry
                echo "<p>Tea Break: {$teaBreakRoom}</p>";
            } elseif ($day === $lunchBreakDay && $timeslot === $lunchBreakTimeslot) {
                // Display lunch break entry
                echo "<p>Lunch Break: {$lunchBreakRoom}</p>";
            }

            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</tbody></table>";

    // Add print button
    echo "<div class='text-center'>";
    echo Html::button('Print Timetable', ['class' => 'btn btn-primary', 'onclick' => 'window.print()']);
    echo "</div>";

    echo "</div>"; // Close the responsive div
}
?>
