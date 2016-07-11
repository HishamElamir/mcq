<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "student_exams_ops".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $exam_id
 *
 * @property User $student
 * @property Exams $exam
 */
class StudentExamsOps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_exams_ops';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'exam_id'], 'required'],
            [['student_id', 'exam_id'], 'integer'],
            [['exam_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'exam_id' => Yii::t('app', 'Exam ID'),
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
    public function getExam()
    {
        return $this->hasOne(Exams::className(), ['id' => 'exam_id']);
    }
}
