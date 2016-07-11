<?php

namespace app\modules\reports\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property integer $teacher_id
 * @property string $q_title
 * @property string $ans_a
 * @property string $ans_b
 * @property string $ans_c
 * @property string $ans_d
 * @property string $ans_e
 * @property string $correct_ans
 * @property string $description
 * @property string $createed_at
 * @property string $updated_at
 *
 * @property ExamsQuestions[] $examsQuestions
 * @property User $teacher
 * @property StudentGrade[] $studentGrades
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'q_title', 'ans_a', 'ans_e', 'correct_ans'], 'required'],
            [['teacher_id'], 'integer'],
            [['correct_ans', 'description'], 'string'],
            [['createed_at', 'updated_at'], 'safe'],
            [['q_title'], 'string', 'max' => 128],
            [['ans_a', 'ans_b', 'ans_c', 'ans_d', 'ans_e'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'q_title' => Yii::t('app', 'Q Title'),
            'ans_a' => Yii::t('app', 'Ans A'),
            'ans_b' => Yii::t('app', 'Ans B'),
            'ans_c' => Yii::t('app', 'Ans C'),
            'ans_d' => Yii::t('app', 'Ans D'),
            'ans_e' => Yii::t('app', 'Ans E'),
            'correct_ans' => Yii::t('app', 'Correct Ans'),
            'description' => Yii::t('app', 'Description'),
            'createed_at' => Yii::t('app', 'Createed At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamsQuestions()
    {
        return $this->hasMany(ExamsQuestions::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGrades()
    {
        return $this->hasMany(StudentGrade::className(), ['question_id' => 'id']);
    }
}
