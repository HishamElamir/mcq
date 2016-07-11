<?php

namespace app\modules\teacher\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $group_id
 * @property string $int_type
 * @property integer $int_id
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Exams $int
 * @property User $user
 * @property Group $group
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id', 'int_type', 'int_id', 'text'], 'required'],
            [['user_id', 'group_id', 'int_id'], 'integer'],
            [['int_type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['text'], 'string', 'max' => 63]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'int_type' => Yii::t('app', 'Int Type'),
            'int_id' => Yii::t('app', 'Int ID'),
            'text' => Yii::t('app', 'Text'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInt()
    {
        return $this->hasOne(Exam::className(), ['id' => 'int_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }
}
