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
class Exam extends \app\modules\admin\models\Exams {

    public function addExam() {
        $this->exam_grade_approval = 0;
        $this->teacher_id = Yii::$app->user->id;
        
        if($this->validate()){
        
            if($this->save()){
                return true;
            }
            else
                return false;
        }
        
    }

}
