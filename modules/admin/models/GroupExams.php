<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "group_exams".
 *
 * @property integer $id
 * @property integer $exam_id
 * @property integer $course_id
 *
 * @property Exams $exam
 * @property Group $course
 */
class GroupExams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group_exams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exam_id', 'course_id'], 'required'],
            [['exam_id', 'course_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'exam_id' => Yii::t('app', 'Exam ID'),
            'course_id' => Yii::t('app', 'Course ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExam()
    {
        return $this->hasOne(Exams::className(), ['id' => 'exam_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Group::className(), ['id' => 'course_id']);
    }
}
