<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $room_id
 * @property string|null $room_name
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Timetable[] $timetables
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['room_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'room_id' => 'Room ID',
            'room_name' => 'Room Name',
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
        return $this->hasMany(Timetable::className(), ['room_id' => 'room_id']);
    }
}
