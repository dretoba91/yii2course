<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property string $name
 * @property int $faculty_id
 * @property string $created_id
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'faculty_id'], 'required'],
            [['faculty_id'], 'integer'],
            [['created_id'], 'safe'],
            [['name'], 'string', 'max' => 64],
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
            'faculty_id' => 'Faculty ID',
            'created_id' => 'Created ID',
        ];
    }

    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['department_id' => 'id']);
    }

    public function getFaculty()
    {
        return $this->hasOne(Faculties::className(), ['id' => 'faculty_id']);
    }
    public function getRegistration()
    {
        return $this->hasOne(Registration::className(), ['department_id' => 'id']);
    }
}
