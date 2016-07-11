<?php

namespace app\modules\teacher\models;

use Yii;

/**
 * This is the model class for table "group_exams".
 *
 * @property integer $id
 * @property integer $exam_id
 * @property integer $group_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Exams $exam
 * @property Group $group
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
            [['exam_id', 'group_id', 'status'], 'required'],
            [['exam_id', 'group_id'], 'integer'],
            [['status'], 'string'],
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
            'exam_id' => Yii::t('app', 'Exam name'),
            'group_id' => Yii::t('app', 'Group name'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExam()
    {
        return $this->hasOne(Exam::className(), ['id' => 'exam_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }
}
