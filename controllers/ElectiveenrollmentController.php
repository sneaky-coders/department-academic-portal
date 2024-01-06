<?php

namespace app\models;

use Yii;
use app\models\Courses;
use app\models\Facultyallotment;

class Randomtimetable extends \yii\db\ActiveRecord
{
    public $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    public $timeslots = ['10:00 AM - 10:55 AM', '10:55 AM - 11:50 AM', '11:50 AM - 12:45 AM', '1 PM - 3 PM', '1 PM - 1:55 PM', '3:30 PM - 4:25 PM'];

    /**
     * Generates a random timetable and saves it to the database.
     *
     * @return Randomtimetable
     * @throws \Throwable
     */
    public function generateRandomTimetable()
    {
        // Get all faculties, courses, and rooms
        $faculties = Faculty::find()->all();
        $courses = Courses::find()->all();
        $rooms = Room::find()->all();

        // Iterate over days and timeslots
        foreach ($this->days as $day) {
            foreach ($this->timeslots as $timeslot) {
                // Randomly select a faculty, course, and room
                $randomFaculty = $this->getRandomItem($faculties);
                $randomCourse = $this->getRandomItem($courses);
                $randomRoom = $this->getRandomItem($rooms);

                // Save the timetable entry
               // Save the timetable entry
$timetableEntry = new Randomtimetable();
$timetableEntry->course_id = $randomCourse->id;
$timetableEntry->semester = $randomCourse->semester; // Provide a value for semester
$timetableEntry->subject_id = 'Subject'; // Adjust as needed
$timetableEntry->scheme = '1'; // Adjust as needed
$timetableEntry->division = 'A'; // Adjust as needed
$timetableEntry->labsession = '0'; // Adjust as needed
$timetableEntry->faculty_id1 = $randomFaculty->id;
$timetableEntry->faculty_id2 = null; // Adjust as needed
$timetableEntry->faculty_id3 = null; // Adjust as needed
$timetableEntry->room = $randomRoom->room; // Assuming the room column is used to store the room name
$timetableEntry->timeslot = $timeslot;
$timetableEntry->day = $day;


                // Check if the entry is already assigned
                $existingEntry = Randomtimetable::find()
                    ->where([
                        'OR',
                        ['faculty_id1' => $randomFaculty->id],
                        ['faculty_id2' => $randomFaculty->id],
                        ['faculty_id3' => $randomFaculty->id],
                    ])
                    ->andWhere(['day' => $day, 'timeslot' => $timeslot])
                    ->exists();

                if (!$existingEntry) {
                    $timetableEntry->save();
                }
            }
        }

        return true;
    }

    /**
     * Helper function to get a random item from an array.
     *
     * @param array $items
     * @return mixed|null
     */
    private function getRandomItem($items)
    {
        return !empty($items) ? $items[array_rand($items)] : null;
    }

    public static function tableName()
    {
        return 'randomtimetable';
    }
}
