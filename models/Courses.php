<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $semester
 * @property string $coursename
 * @property string $coursecode
 * @property int $credits
 * @property string $created_at
 * @property string|null $updated_at
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semester', 'coursename', 'coursecode', 'credits'], 'required'],
            [['credits'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['semester'], 'string', 'max' => 20],
            [['coursename'], 'string', 'max' => 100],
            [['coursecode'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'semester' => 'Semester',
            'coursename' => 'Coursename',
            'coursecode' => 'Coursecode',
            'credits' => 'Credits',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
