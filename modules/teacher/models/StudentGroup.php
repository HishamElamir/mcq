<?php

namespace app\modules\teacher\models;

use Yii;

/**
 * This is the model class for table "student_groups".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $course_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $student
 * @property Group $course
 */
class StudentGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id', 'status'], 'required'],
            [['student_id', 'course_id'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            //[['course_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student name'),
            'course_id' => Yii::t('app', 'Group name'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Group::className(), ['id' => 'course_id']);
    }
    
     public function getStudentsInGroup($groupId){
       return  \app\Modules\teacher\models\Student::find()
                 ->join('inner join' , 'student_groups' , 'student_groups.course_id = '. $groupId)->all;
    }
}
