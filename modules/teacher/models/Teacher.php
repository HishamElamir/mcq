<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher
 *
 * @author prog_hamdy
 */
namespace app\modules\teacher\models;

use app\models\User;

use app\modules\teacher\models\Design_pattern_Strategy\TakeSalaryWithBank;

class Teacher extends User{
  
   public function __construct($config = array()) {
      $this->takeSalaryBehavoir = new TakeSalaryWithBank();
   }

   

}
