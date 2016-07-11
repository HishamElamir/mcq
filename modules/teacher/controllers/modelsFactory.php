<?php
namespace app\modules\teacher\controllers;


use app\modules\teacher\models\Group;
use app\modules\teacher\models\Exam;
use app\modules\teacher\models\Notes;
use app\modules\admin\models\StudentExamsOps;
use app\modules\teacher\models\GroupExams;
use app\modules\admin\models\User;
use app\modules\admin\models\AuthAssignment;
use app\modules\teacher\models\StudentGroup;
use app\modules\admin\models\QuestionSolved;
use app\modules\teacher\models\Question;
use app\modules\admin\models\ExamsQuestions;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * models Factory
 * 
 * @param string $modelName
 *
 * @author wolf
 */
class modelsFactory {
    
    private function __construct(){}
    private function __clone() {}

    public static function getModel($modelName){
        if($modelName == null){
            return null;
        }elseif($modelName == "group"){
            return new Group();
        }elseif($modelName == "exam"){
            return new \app\modules\admin\models\Exams();
        }else if($modelName == "student-exams"){
            return new StudentExamsOps();
        }else if($modelName == "group-exams"){
            return new GroupExams();
        }else if($modelName == "auth-assign"){
            return new AuthAssignment();
        }else if($modelName == "user"){
            return new User();
        }else if($modelName == "stu-group"){
            return new StudentGroup();
        }else if($modelName == "ques-solve"){
            return new QuestionSolved();
        }else if($modelName == "exam-ques"){
            return new ExamsQuestions();
        }else if($modelName == "question"){
            return new Question();
        }else if($modelName == "notes"){
            return new Notes();
        }
    }
}
