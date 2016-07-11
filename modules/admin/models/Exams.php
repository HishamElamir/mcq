<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "exams".
 *
 * @property integer $id
 * @property integer $teacher_id
 * @property string $name
 * @property string $est_date
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $teacher
 * @property ExamsQuestions[] $examsQuestions
 * @property GroupExams[] $groupExams
 * @property StudentExamsOps $studentExamsOps
 */
class Exams extends \yii\db\ActiveRecord
{
      public function behaviors() {
        return [
                 [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                 'value' => new Expression('NOW()'),
            ],
        ];
       }
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
            [['teacher_id', 'name'], 'required'],
            [['teacher_id'], 'integer'],
            [['est_date', 'created_at', 'updated_at'], 'safe'],
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
}
