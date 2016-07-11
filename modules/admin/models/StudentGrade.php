<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "student_grade".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $question_id
 * @property integer $question_solved_id
 * @property integer $grade
 *
 * @property User $student
 * @property Question $question
 * @property QuestionSolved $questionSolved
 */
class StudentGrade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'question_id', 'question_solved_id', 'grade'], 'required'],
            [['student_id', 'question_id', 'question_solved_id', 'grade'], 'integer'],
            [['question_id', 'question_solved_id'], 'unique', 'targetAttribute' => ['question_id', 'question_solved_id'], 'message' => 'The combination of Question ID and Question Solved ID has already been taken.'],
            [['question_solved_id'], 'unique']
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
            'question_id' => Yii::t('app', 'Question ID'),
            'question_solved_id' => Yii::t('app', 'Question Solved ID'),
            'grade' => Yii::t('app', 'Grade'),
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
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionSolved()
    {
        return $this->hasOne(QuestionSolved::className(), ['id' => 'question_solved_id']);
    }
}
