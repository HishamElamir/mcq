<?php

namespace app\modules\reports\models;

use Yii;

/**
 * This is the model class for table "exams_questions".
 *
 * @property integer $id
 * @property integer $exam_id
 * @property integer $question_id
 * @property string $created_at
 * @property string $updated_at
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
            [['exam_id', 'question_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
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
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
