<?php

namespace app\modules\teacher\models;

use Yii;

/**
 * This is the model class for table "{{%group}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $course_id
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
        return '{{%group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'course_id'], 'required'],
            [['description'], 'string'],
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
            'course_id' => Yii::t('app', 'Course name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
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

    /**
     * @inheritdoc
     * @return GroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GroupQuery(get_called_class());
    }
    
    public function getStudentsInGroup($id){
        
                
//        $query = new \yii\db\Query();
//        $data = $query->select('user.*')->from('user')
//                ->join('inner join', 'student_groups', 'student_groups.student_id = user.id')
//                ->join('left join', 'group', 'student_groups.course_id = '.$course_id)
//                ->all();
        
        $group = \app\modules\teacher\models\Group::find()->where(['id' => $id])->one();
        $course_id =  $group->department_id;
        $query = \app\Modules\teacher\models\Student::find()
                ->join('inner join', 'student_groups', 'student_groups.student_id = user.id')
                ->join('left join', 'group', 'student_groups.course_id = '.$course_id);

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

       

        return $dataProvider;
        
        
//        $group = \app\modules\teacher\models\Group::find()->where(['id' => $id])->one();
//        $course_id =  $group->department_id;
//        $Students = \app\Modules\teacher\models\Student::find()
//                ->join('inner join', 'student_groups', 'student_groups.student_id = user.id')
//                ->join('left join', 'group', 'student_groups.course_id = '.$course_id)
//                ->all();
//       
//       return $Students;
    }
    
    public function notifyObderver() {
        $result= FALSE;
        foreach ($this->observers as $observer ) {
           $result = $observer->updateObserver();
        }
        return $result;
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
