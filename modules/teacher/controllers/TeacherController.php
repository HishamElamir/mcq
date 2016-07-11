<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\teacher\controllers;

use yii\web\Controller;
use app\modules\teacher\models\Teacher;
use app\modules\teacher\models\Teacher_Assistant;
use app\modules\teacher\models\Design_pattern_Strategy\TakeSalaryWith5azna;
use app\modules\teacher\models\Design_pattern_Strategy\TakeSalaryWithBank;

//use app\modules\teacher\models\TakeSalaryBehavoir;

class TeacherController extends Controller {

    public $group;

    public function actionIndex() {
//        $teacher = new Teacher();
//        $teacher_A = new Teacher_Assistant();
//        
//        
//        $data_constructor['T'] = 'Teacher : '.$teacher->performTakeSalaryBehavoir();
//        $data_constructor['T_A'] = 'Teacher Assistant : '.$teacher_A->performTakeSalaryBehavoir();
//
//       
//        $teacher->setTakeSalaryBehavoir(new TakeSalaryWith5azna());
//        $teacher_A->setTakeSalaryBehavoir(new TakeSalaryWithBank());
//        
//        $data_set['T']= 'Teacher : '.$teacher->performTakeSalaryBehavoir();
//        $data_set['T_A'] = 'Teacher Assistant : '.$teacher_A->performTakeSalaryBehavoir();
        
       
        
        return $this->render("index");
    }
    public function actionTakeSalary() {
        $teacher = new Teacher();
        $teacher_A = new Teacher_Assistant();
        
        
        $data_constructor['T'] = 'Teacher : '.$teacher->performTakeSalaryBehavoir();
        $data_constructor['T_A'] = 'Teacher Assistant : '.$teacher_A->performTakeSalaryBehavoir();

       
        $teacher->setTakeSalaryBehavoir(new TakeSalaryWith5azna());
        $teacher_A->setTakeSalaryBehavoir(new TakeSalaryWithBank());
        
        $data_set['T']= 'Teacher : '.$teacher->performTakeSalaryBehavoir();
        $data_set['T_A'] = 'Teacher Assistant : '.$teacher_A->performTakeSalaryBehavoir();
        
       
        
        return $this->render('strategy', ['data_constructor' => $data_constructor, 'data_set' => $data_set]);
    }
    
    

    public function actionRegisterStudent($create_exam = 0) {

        $student1 = new \app\Modules\teacher\models\Student();
        $student1->id = 1;
        $student2 = new \app\Modules\teacher\models\Student();
        $student2->id = 2;
        $student3 = new \app\Modules\teacher\models\Student();
        $student3->id = 3;
        $student4 = new \app\Modules\teacher\models\Student();
        $student4->id = 4;
        $student5 = new \app\Modules\teacher\models\Student();
        $student5->id = 5;

        $this->group = new \app\modules\admin\models\Group();

        $registerStudMess1 = $this->group->registerObderver($student1);
        $registerStudMess2 = $this->group->registerObderver($student2);
        $registerStudMess3 = $this->group->registerObderver($student3);
        $registerStudMess4 = $this->group->registerObderver($student4);
        $registerStudMess5 = $this->group->registerObderver($student5);
        $request = $create_exam;

        if ($create_exam == 1) {
            $createExamMessage = 'you created the exam successfully!!';
            $data = $this->group->notifyObderver();
            return $this->render('notification', ['createExamMessage' => $createExamMessage, 'data' => $data]);
        } else {
            return $this->render('register-student', ['registerStudMess1' => $registerStudMess1,
                        'registerStudMess2' => $registerStudMess2,
                        'registerStudMess3' => $registerStudMess3,
                        'registerStudMess4' => $registerStudMess4,
                        'registerStudMess5' => $registerStudMess5,
                        'request' => $request]);
        }

        
    }


}
