<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $name
 * @property string $course_code
 * @property int $unit
 * @property int $level_id
 * @property int $department_id
 * @property string $created_id
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
            [['name', 'course_code', 'unit', 'level_id', 'department_id'], 'required'],
            [['unit', 'level_id', 'department_id'], 'integer'],
            [['created_id'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['course_code'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'course_code' => 'Course Code',
            'unit' => 'Unit',
            'level_id' => 'Level ID',
            'department_id' => 'Department ID',
            'created_id' => 'Created ID',
        ];
    }
}
