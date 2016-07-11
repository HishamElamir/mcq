<?php

namespace app\modules\teacher\models;

use Yii;

/**
 * This is the model class for table "exams".
 *
 * @property integer $id
 * @property integer $teacher_id
 * @property string $name
 * @property string $est_date
 * @property integer $exam_grade_approval
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $teacher
 * @property ExamsQuestions[] $examsQuestions
 * @property GroupExams[] $groupExams
 * @property StudentExamsOps $studentExamsOps
 */
class Exam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'name', 'est_date', 'exam_grade_approval'], 'required'],
            [['teacher_id', 'est_date', 'exam_grade_approval'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 32]
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
            'name' => Yii::t('app', 'Name'),
            'est_date' => Yii::t('app', 'Est Date'),
            'exam_grade_approval' => Yii::t('app', 'Exam Grade Approval'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
    public function getExamsQuestions()
    {
        return $this->hasMany(ExamsQuestions::className(), ['exam_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupExams()
    {
        return $this->hasMany(GroupExams::className(), ['exam_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentExamsOps()
    {
        return $this->hasOne(StudentExamsOps::className(), ['exam_id' => 'id']);
    }
    
    public function addExam() {
        $this->exam_grade_approval = 0;
        $this->teacher_id = Yii::$app->user->id;
        
        //if($this->validate()){
        
            if($this->save()){
                return true;
            }
            else
                return false;
        //}
        
    }
}
