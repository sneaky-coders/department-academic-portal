<?php 

// controllers/TimetableGeneratorController.php

namespace app\controllers;

use yii\web\Controller;
use app\models\TimetableGenerator;

class TimetableGeneratorController extends Controller
{
    public function actionGenerateRandomTimetable()
    {
        $timetableGenerator = new TimetableGenerator();
        $randomTimetable = $timetableGenerator->generateRandomTimetable();

        // Now you can pass $randomTimetable to your view or perform any other actions

        return $this->render('random_timetable', [
            'randomTimetable' => $randomTimetable,
        ]);
    }
}


?>