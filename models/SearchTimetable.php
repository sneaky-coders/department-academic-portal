<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Timetable;

/**
 * SearchTimetable represents the model behind the search form of `app\models\Timetable`.
 */
class SearchTimetable extends Timetable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timetable_id', 'course_id', 'subject_id', 'faculty_id', 'room_id', 'time_slot_id', 'day_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Timetable::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'timetable_id' => $this->timetable_id,
            'course_id' => $this->course_id,
            'subject_id' => $this->subject_id,
            'faculty_id' => $this->faculty_id,
            'room_id' => $this->room_id,
            'time_slot_id' => $this->time_slot_id,
            'day_id' => $this->day_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
