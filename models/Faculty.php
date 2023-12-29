<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property int $contact
 * @property string $staffid
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Users $user
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'email', 'contact', 'staffid'], 'required'],
            [['user_id', 'contact'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
            [['staffid'], 'string', 'max' => 30],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Username',
            'name' => 'Name',
            'email' => 'Email',
            'contact' => 'Contact',
            'staffid' => 'Staffid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }
}