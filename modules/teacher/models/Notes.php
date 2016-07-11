<?php

namespace app\modules\teacher\models;

use Yii;

/**
 * This is the model class for table "notes".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $user_id
 * @property string $message
 * @property string $integration
 * @property integer $int_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Group $group
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'user_id', 'message', 'integration', 'int_id'], 'required'],
            [['group_id', 'user_id', 'int_id'], 'integer'],
            [['message', 'integration'], 'string'],
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
            'group_id' => Yii::t('app', 'Group ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'message' => Yii::t('app', 'Message'),
            'integration' => Yii::t('app', 'Integration'),
            'int_id' => Yii::t('app', 'Int ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
