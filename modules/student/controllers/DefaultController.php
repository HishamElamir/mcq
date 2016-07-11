<?php

namespace app\modules\student\controllers;


use Yii;
use app\modules\admin\models\StudentExamsOps;
use app\modules\admin\models\QuestionSolved;
use app\modules\admin\models\Exams;
use app\modules\admin\models\ExamsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\teacher\controllers\modelsFactory;
use app\modules\teacher\controllers\helperFactory;

class DefaultController extends Controller
{
    public function actionIndex(){
        if(\Yii::$app->user->can('student'))
        {
            $groups = helperFactory::getModel('array')->map(modelsFactory::getModel('stu-group')->find()->where(['student_id' => \Yii::$app->user->getId()])->all(), 'id', 'course_id');
            $data = array();
            foreach ($groups as $group){
                $data[$group] = helperFactory::getModel('array')->map(modelsFactory::getModel('notes')->find()->where(['group_id' => $group])->all(), 'id', 'message');
            }
            $allStudentGroups = array();
            foreach ($groups as $group){
                $allStudentGroups[$group] = helperFactory::getModel('array')->map(modelsFactory::getModel('group')->find()->where(['id'=> $group])->all(), 'title', 'description');
            }
            
            return $this->render('index', [
                'groups' => $allStudentGroups,
                'data' => $data
            ]);
        }else{
            $this->redirect($this->goHome());
        }
    }
    
    public function actionExamView($id){
        
        if (\Yii::$app->user->can('student')) {
            $modelAnswer = modelsFactory::getModel('ques-solve');   //new QuestionSolved();
            if ($modelAnswer->load(\Yii::$app->request->post())) {
                foreach(Yii::$app->request->post()['QuestionSolved'] as $key => $value) {
                $modelAnswer = modelsFactory::getModel('ques-solve');   //new QuestionSolved();
                // find examQuestion ID
                $examQuestion = modelsFactory::getModel('exam-ques')->find()->where(['exam_id' => $id])->where(['question_id' => $key])->one();
                $modelAnswer->student_id= \Yii::$app->user->getId();
                $modelAnswer->exam_question_id = $examQuestion['id'];
                $modelAnswer->answer = $value;
                $modelAnswer->save();
                }
                if ($modelAnswer->save()) {
                    \Yii::$app->getSession()->setFlash('consol_v_error', 'You had Entered this exam before, try another exam or talk with the teacher..');
                    $this->redirect(['index']);
                }
            }
            
            $userAndExam = modelsFactory::getModel('student-exams')->find()->where(['student_id' => \Yii::$app->user->id])->where(['exam_id' => $id])->count();
            //  Check if student get here before or not
            if( $userAndExam > 0 )
            {   //  If student get here before
                \Yii::$app->getSession()->setFlash('consol_v_error', 'You had Entered this exam before, try another exam or talk with the teacher.');
                $this->redirect(['index']);
            }else 
            {
                //  Mark student as getting inside the exam
                if($this->studentExamOps($id, \Yii::$app->user->getId()))
                {
                    
                    $examQuestionsId    = modelsFactory::getModel('exam-ques')->find()->where(['exam_id' => $id])->all();
                    $examQuestionsIdOrg = helperFactory::getModel('array')->map($examQuestionsId, 'id', 'question_id');
                    $questions          = modelsFactory::getModel('question')->find()->where(['id' => $examQuestionsIdOrg])->all();
                    $answer             = [modelsFactory::getModel('ques-solve')];
                    return $this->render('exam-view', [                      //  ExamInfo, Questions
                            'model' => $this->findModel($id),
                            'questions' => $questions,
                            'answer'    => $answer,
                        ]);
                }
            }
        }  else {
            return $this->goBack($this->goHome());
        }
    }
    
    public function actionGroupView($id){
        $comment = new \app\models\Comments();
        if ($comment->load(Yii::$app->request->post())) {
            $comment->user_id = \Yii::$app->user->getId();
            $comment->created_at = date('Y-m-d H:i:s');
            $comment->save();
        }
        if (\Yii::$app->user->can('student-view-group')) {
            $groupMember = modelsFactory::getModel('stu-group')->find()->where(['student_id' => \Yii::$app->user->getId()])->where(['course_id' => $id])->one();
            $group = modelsFactory::getModel('group')->findOne($id);
            if ($groupMember['status'] == 'active' || $group['status'] == 'active') {
                return $this->render('group-view', [
                    'model' => $group,
                    'comment' => $comment
                ]);
            }else {
                throw new NotFoundHttpException('The requested group is not active yet.');
            }
        }  else {
            throw new NotFoundHttpException('You\'re not allow to enter here!');
        }
    }
    
    public function actionReportView(){
        
        $examsAttend = helperFactory::getModel('array')->map(modelsFactory::getModel('student-exams')->findAll(['student_id' => \Yii::$app->user->getId()]), 'id', 'exam_id');
        $studentGroups = helperFactory::getModel('array')->map(modelsFactory::getModel('stu-group')->findAll(['student_id' => \Yii::$app->user->getId()]), 'id', 'course_id');
        
        foreach ($studentGroups as $group){
            $allExams = helperFactory::getModel('array')->map(modelsFactory::getModel('group-exams')->findAll(['group_id' => $group]), 'id', 'exam_id');
        }
        
        foreach ($examsAttend as $exam){
            $questionInExams = helperFactory::getModel('array')->map(modelsFactory::getModel('exam-ques')->findAll(['exam_id' => $exam]), 'id', 'question_id');
            $ExamsName = helperFactory::getModel('array')->map(modelsFactory::getModel('exam')->findAll(['id' => $exam]), 'id', 'name');
        }
        
        foreach ($questionInExams as $question){
            $questionsGrade = helperFactory::getModel('array')->map(modelsFactory::getModel('grades')->findAll(['student_id' => \Yii::$app->user->getId()]), 'id', 'grade');
        }
        
        return $this->render('report',[
            'examsAttend' => $examsAttend,
            'questionInExams' => $questionInExams,
            'ExamsName' => $ExamsName,
            'questionsGrade' => $questionsGrade,
            'allExams' => $allExams
        ]);
    }
    
    
    public function studentExamOps($examId, $studentId){
        $model = new \app\modules\admin\models\StudentExamsOps();
        
        $model->student_id  = $studentId;
        $model->exam_id     = $examId; 
        $model->save();
        return TRUE;
    }
    
    protected function findModel($id){
        if (($model = \app\modules\admin\models\Exams::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
}
