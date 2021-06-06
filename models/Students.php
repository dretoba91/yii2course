<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property int $user_id
 * @property int $faculty_id
 * @property int $department_id
 * @property int $level_id
 * @property string $created_at
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'faculty_id', 'department_id', 'level_id'], 'required'],
            [['user_id', 'faculty_id', 'department_id', 'level_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'faculty_id' => 'Faculty ID',
            'department_id' => 'Department ID',
            'level_id' => 'Level ID',
            'created_at' => 'Created At',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getRegistration()
    {
        return $this->hasOne(Registration::className(), ['student_id' => 'user_id']);
    }


     public function getFaculty()
    {
        return $this->hasOne(Faculties::className(), ['id' => 'faculty_id']);
    }

     public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }

    public function getLevel()
    {
        return $this->hasOne(Levels::className(), ['id' => 'level_id']);
    }
}


