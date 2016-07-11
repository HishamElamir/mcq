<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TakeSalaryWith5azna
 *
 * @author prog_hamdy
 */

namespace app\modules\teacher\models\Design_pattern_Strategy;
use app\modules\teacher\models\Design_pattern_Strategy\ITakeSalaryBehavoir;

class TakeSalaryWith5azna implements ITakeSalaryBehavoir {
    public function takeSalaryBehavoir(){
        return "TakeSalaryWith5azna" ;
    }
}
