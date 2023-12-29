<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timeslot".
 *
 * @property int $time_slot_id
 * @property string|null $start_time
 * @property string|null $end_time
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Timetable[] $timetables
 */
class Timeslot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timeslot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_time', 'end_time', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'time_slot_id' => 'Time Slot ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Timetables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['time_slot_id' => 'time_slot_id']);
    }
}
