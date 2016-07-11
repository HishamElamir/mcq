<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TakeSalaryWithBank
 *
 * @author prog_hamdy
 */

namespace app\modules\teacher\models\Design_pattern_Strategy;
use app\modules\teacher\models\Design_pattern_Strategy\ITakeSalaryBehavoir;
class TakeSalaryWithBank implements ITakeSalaryBehavoir {
    public function takeSalaryBehavoir(){
        return "TakeSalaryWithBank" ;
    }
}
