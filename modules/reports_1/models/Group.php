<?php

namespace app\modules\reports\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $course_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Courses $course
 * @property GroupExams[] $groupExams
 * @property Notes[] $notes
 * @property Notifications[] $notifications
 * @property StudentGroups $studentGroups
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'course_id', 'status'], 'required'],
            [['description', 'status'], 'string'],
            [['course_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'course_id' => Yii::t('app', 'Course ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupExams()
    {
        return $this->hasMany(GroupExams::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Notes::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::className(), ['group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroups()
    {
        return $this->hasOne(StudentGroups::className(), ['course_id' => 'id']);
    }
}
