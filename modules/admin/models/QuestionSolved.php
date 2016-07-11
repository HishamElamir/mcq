<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "question_solved".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $exam_question_id
 * @property string $answer
 *
 * @property User $student
 * @property ExamsQuestions $examQuestion
 * @property StudentGrade $studentGrade
 */
class QuestionSolved extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_solved';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'exam_question_id', 'answer'], 'required'],
            [['student_id', 'exam_question_id'], 'integer'],
            [['answer'], 'string']
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
            'exam_question_id' => Yii::t('app', 'Exam Question ID'),
            'answer' => Yii::t('app', 'Answer'),
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
    public function getExamQuestion()
    {
        return $this->hasOne(ExamsQuestions::className(), ['id' => 'exam_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGrade()
    {
        return $this->hasOne(StudentGrade::className(), ['question_solved_id' => 'id']);
    }
}
