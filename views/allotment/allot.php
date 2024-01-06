
<?php
use yii\helpers\Html;

$this->title = 'Mentor Allotment';

echo '<h1>Mentor Allotment</h1>';

echo '<h2>Allotment Results:</h2>';

echo '<table class="table table-bordered">';
echo '<thead><tr><th>Mentee</th><th>Mentor</th></tr></thead>';
echo '<tbody>';

foreach ($mentees as $mentee) {
    $mentor = $this->findMentor($mentee, $mentors);
    echo '<tr>';
    echo '<td>' . Html::encode($mentee->username) . '</td>';
    echo '<td>' . Html::encode($mentor->username) . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
