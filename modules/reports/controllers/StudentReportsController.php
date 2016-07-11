<?php

namespace app\modules\reports\controllers;

use Yii;
use app\modules\reports\models\User;
use app\modules\reports\models\StudentExamsOps;
use app\modules\reports\models\Exams;
use app\modules\reports\models\Question;
use app\modules\reports\models\ExamsQuestions;
use app\modules\reports\models\QuestionSolved;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class StudentReportsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $exams = array();
        $examswithquestions = array();
	if (\Yii::$app->user->can('student'))
	{
		$student_exams = StudentExamsOps::find()

			->where(['student_id' =>  \Yii::$app->user->getId()])//must be changed to current logged in student
			->orderBy('id')
			->all();
		foreach($student_exams as $student_exam){
			$exams[$student_exam->exam_id] = Exams::find()
				->where(['id' => $student_exam->exam_id])
				->one();
		}
		//fetch all exams quistions	
		foreach($exams as $exam){
			$exam_questions = ExamsQuestions::find()
				->where(['exam_id' => $exam->id])
				->orderBy('id')
				->all();
			foreach($exam_questions as $exam_question){
				$questions[$exam_question->question_id] = Question::find()
					->where(['id' => $exam_question->question_id])
					->one();
				$answers[$exam_question->question_id] = QuestionSolved::find()
					->where(['exam_question_id' => $exam_question->id])->andWhere(['student_id' => \Yii::$app->user->getId()])
					->one();
			}
			$teacher = User::find()
					->where(['id' => $exam->teacher_id])
					->one();
			$examswithquestions[$exam->id][0] = $exam;
			$examswithquestions[$exam->id][1] = $teacher;
			$examswithquestions[$exam->id][2] = $questions;
			$examswithquestions[$exam->id][3] = $answers;
		}
        return $this->render('index',array('examswithquestions'=> $examswithquestions));
    	}
    	else {
    		 return $this->goBack($this->goHome());
    	}
	}
		

}
