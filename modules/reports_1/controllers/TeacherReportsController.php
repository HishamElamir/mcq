<?php

namespace app\modules\reports\controllers;

use Yii;
use app\modules\reports\models\Exams;
use app\modules\reports\models\ExamsQuestions;
use app\modules\reports\models\Question;
use app\modules\reports\models\QuestionSolved;
use app\modules\reports\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TeacherReportsController extends Controller {

    public function actionIndex() {
        $examswithquestions = array();
        $students = array();
        $exams = Exams::find()
                ->where(['teacher_id' => \Yii::$app->user->getId()])//must be changed to current logged in teacher
                ->orderBy('id')
                ->all();

        //fetch all exams quistions		
        foreach ($exams as $exam) {
            $exam_questions = ExamsQuestions::find()
                    ->where(['exam_id' => $exam->id])
                    ->orderBy('id')
                    ->all();
            foreach ($exam_questions as $exam_question) {
                $questions[$exam_question->id] = Question::find()
                        ->where(['id' => $exam_question->question_id])
                        ->one();

                $question_solved_students[$exam_question->id] = QuestionSolved::find()
                        ->where(['exam_question_id' => $exam_question->id])
                        ->orderBy('id')
                        ->all();
            }
            foreach ($question_solved_students as $question_solved_student) {
                foreach ($question_solved_student as $record) {
                    $students[$record->exam_question_id][$record->id][0] = User::find()
                            ->where(['id' => $record->student_id])
                            ->one();
                    $students[$record->exam_question_id][$record->id][1] = $record->answer;
                }
            }
            $examswithquestions[$exam->id][0] = $exam;
            $examswithquestions[$exam->id][1] = $questions;
        }
        return $this->render('index', array('examswithquestions' => $examswithquestions,
                    'students' => $students));
    }

}
