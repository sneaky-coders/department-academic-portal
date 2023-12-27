<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Courses;

class Timetable extends ActiveRecord
{
    public function generateTimetable()
    {
        // Get all courses
        $courses = Courses::find()->all();

        // Iterate through each course
        foreach ($courses as $course) {
            // Calculate the number of lectures based on credits
            $lecturesPerWeek = $this->calculateLectures($course->credits);

            if ($lecturesPerWeek > 0) {
                // Generate timetable entries
                for ($i = 0; $i < $lecturesPerWeek; $i++) {
                    $timetableEntry = new Timetable();
                    $timetableEntry->course_id = $course->id;

                    // Set other attributes such as teacher, day, time, etc.
                    $this->setTimetableEntryAttributes($timetableEntry);

                    $timetableEntry->save();
                }
            }
        }
    }

    protected function calculateLectures($credits)
    {
        // Customize the logic based on your requirements
        return $credits == 4 ? 4 : ($credits == 2 ? 2 : 0);
    }

    protected function setTimetableEntryAttributes($timetableEntry)
    {
        // Customize this method to set attributes such as teacher, day, time, etc.
        // Example: $timetableEntry->teacher_id = $this->findAvailableTeacher();
        // Example: $timetableEntry->day = $this->findAvailableDay();
        // Example: $timetableEntry->time_start = $this->findAvailableTime();
        // ...
    }

    public function rules()
    {
        return [
            [['course_id', 'teacher_id'], 'integer'],
            [['day', 'time_start', 'time_end'], 'required'],
            [['time_start', 'time_end', 'created_at', 'updated_at'], 'safe'],
            [['day'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'teacher_id' => 'Teacher ID',
            'day' => 'Day',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }

    public function getTeacher()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'teacher_id']);
    }
}
