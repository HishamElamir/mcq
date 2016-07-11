<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher_Assistant
 *
 * @author prog_hamdy
 */
namespace app\modules\teacher\models;
use app\modules\teacher\models\Design_pattern_Strategy\TakeSalaryWith5azna;
use app\models\User;
use app\modules\teacher\models\Teacher;

class Teacher_Assistant extends User{
    
   public function __construct() {
      $this->takeSalaryBehavoir = new TakeSalaryWith5azna();
   }
}
