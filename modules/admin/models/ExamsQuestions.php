<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "exams_questions".
 *
 * @property integer $id
 * @property integer $exam_id
 * @property integer $question_id
 *
 * @property Exams $exam
 * @property Question $question
 * @property QuestionSolved[] $questionSolveds
 */
class ExamsQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exams_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exam_id', 'question_id'], 'required'],
            [['exam_id', 'question_id'], 'integer']
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
            'question_id' => Yii::t('app', 'Question ID'),
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
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionSolveds()
    {
        return $this->hasMany(QuestionSolved::className(), ['exam_question_id' => 'id']);
    }
}
