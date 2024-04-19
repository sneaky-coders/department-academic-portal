<!-- views/allotment/allotment-complete.php -->
<?php
use yii\helpers\Html;

$this->title = 'Allotment Complete';
?>

<h1>Allotment Complete</h1>

<p>Mentees have been randomly allotted to mentors based on CGPA.</p>

<h2>Mentor-Mentee Allotment:</h2>

<ul>
    <?php foreach ($mentors as $mentor): ?>
        <li>
            Mentor: <?= Html::encode($mentor->name) ?>
            <ul>
                <?php foreach ($mentor->mentees as $mentee): ?>
                    <li>Mentee: <?= Html::encode($mentee->name) ?></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>
