<?php

namespace app\modules\teacher\models;

use Yii;

/**
 * This is the model class for table "{{%courses}}".
 *
 * @property integer $id
 * @property integer $teacher_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $teacher
 * @property Group[] $groups
 */
class Course extends \app\modules\admin\models\Courses
{
    
    public function getCoursesByTeacherId(){
        return $this->find()->where(['teacher_id' => $this->teacher_id])->all();
    }
}
