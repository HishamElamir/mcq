<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $department_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Courses $department
 * @property GroupExams[] $groupExams
 * @property StudentGroups $studentGroups
 */
class Group extends \yii\db\ActiveRecord implements \app\modules\teacher\models\Design_pattern_Observer\ISubject
{
    /**
     * @inheritdoc
     */
     public  $observers = array();
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
            [['title', 'department_id'], 'required'],
            [['description'], 'string'],
            [['department_id'], 'integer'],
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
            'department_id' => Yii::t('app', 'Department ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Courses::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupExams()
    {
        return $this->hasMany(GroupExams::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGroups()
    {
        return $this->hasOne(StudentGroups::className(), ['course_id' => 'id']);
    }
    
    public function notifyObderver() {
        $data = array();
        foreach ($this->observers as $observer ) {
            $data[] = $observer->updateObserver();
        }
        return $data;
    }

    public function registerObderver($observer) {
        $this->observers[] = $observer;
        return "student register , ID = ".$observer->id;
    }

    public function removeObderver($id) {
        
        $found = 0;
        for( $i = 0 ; $i < count($this->observers) ; $i++){
            if($observer[i]->id == $id ){
                $found = 1;
                break;
            }
        }
        
        if($found == 1)
            unset($this->observers[i]);
        else            return"Id not found ";
        
    }
}
