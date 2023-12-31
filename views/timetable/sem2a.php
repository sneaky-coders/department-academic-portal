<!-- views/timetable/index.php -->

<?php

use yii\helpers\Html;

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
$semester = '2';  // Set the desired semester
$division = 'A';           // Set the desired division

$this->params['breadcrumbs'][] = ['label' => 'Sem'.$semester . ' Division ' . $division, 'url' => ['/timetable/index']];

echo "<div class='header'>";
echo "<h2>Sem :{$semester} Div - {$division}</h2>";
echo "</div>";

if (empty($timetableData)) {
    echo "<p>No timetable entries available.</p>";
} else {
    // Filter timetable data for the selected semester and division
    $filteredTimetable = array_filter($timetableData, function ($entry) use ($semester, $division) {
        return $entry->semester === $semester && $entry->division === $division;
    });

    // Group filtered timetable entries by day and timeslot
    $groupedTimetable = [];
    $allTimeslots = [];
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

    foreach ($filteredTimetable as $entry) {
        $day = $entry->day;
        $timeslot = $entry->timeslot;

        $groupedTimetable[$day][$timeslot][] = $entry;
        $allTimeslots[$timeslot] = true;
    }

    // Sort timeslots in ascending order
    ksort($allTimeslots);

    echo "<div class='table-responsive'>"; // Make the table responsive

    echo "<table class='table table-bordered table-striped' style='max-height: 500px;'>"; // Set max height for the table

    // Display header row with timeslots and days
    echo "<thead><tr>";
    echo "<th colspan='" . (count($allTimeslots) + 1) . "' class='text-center'>Sem {$semester} Div - {$division}</th>"; // Span across all timeslots
    echo "</tr><tr>"; // Add a new row

    echo "<th>Day/Time Slot</th>";

    // Display timeslots
    foreach (array_keys($allTimeslots) as $timeslot) {
        echo "<th>{$timeslot}</th>";
    }

    echo "</tr></thead>";

    // Display rows for each day
    echo "<tbody>";
    foreach ($days as $day) {
        echo "<tr>";
        echo "<th>{$day}</th>"; // Display day in th

        foreach (array_keys($allTimeslots) as $timeslot) {
            echo "<td>";

            // Check if entries exist for this day and timeslot
            if (isset($groupedTimetable[$day][$timeslot])) {
                // Display entries for each timeslot
                foreach ($groupedTimetable[$day][$timeslot] as $entry) {
                    // Fetch related models for additional details
                    $subjectModel = $entry->getSubject()->one(); // Assuming you have a method named getSubject in Timetable model

                    // Display additional details
                    echo "<p>";
                    echo Html::encode("Course: {$subjectModel->coursename}") . "<br>";
                    echo Html::encode("Course Code: {$subjectModel->coursecode}") . "<br>";
                    echo Html::encode("Semester: {$subjectModel->semester}") . "<br>";

                    // Display faculty details
                    echo "Faculty 1: " . Html::encode($entry->facultyId1->name ?? 'N/A') . "<br>";
                    echo "Faculty 2: " . Html::encode($entry->facultyId2 ? $entry->facultyId2->name : 'N/A') . "<br>";
                    echo "Faculty 3: " . Html::encode($entry->facultyId3 ? $entry->facultyId3->name : 'N/A') . "<br>";

                    echo Html::encode("Room: {$entry->room}") . "<br>";
                    echo "</p>";
                }
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
