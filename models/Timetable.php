<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property int $timetable_id
 * @property int|null $course_id
 * @property int $subject_id
 * @property int|null $faculty_id
 * @property int|null $room_id
 * @property int|null $timeslot
 * @property int|null $day_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Faculty $faculty
 * @property Semester $course
 * @property Courses $subject
 * @property Day $day
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'subject_id', 'faculty_id', 'room_id', 'timeslot', 'day_id'], 'integer'],
            [['subject_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['day_id'], 'exist', 'skipOnError' => true, 'targetClass' => Day::className(), 'targetAttribute' => ['day_id' => 'day_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'timetable_id' => 'Timetable ID',
            'course_id' => 'Course ID',
            'subject_id' => 'Subject ID',
            'faculty_id' => 'Faculty ID',
            'room_id' => 'Room ID',
            'timeslot' => 'Timeslot',
            'day_id' => 'Day ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Semester::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Courses::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[Day]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(Day::className(), ['day_id' => 'day_id']);
    }
}
