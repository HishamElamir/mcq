<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\teacher\models\Design_pattern_Observer;

/**
 *
 * @author prog_hamdy
 */
interface ISubject {
    public function registerObderver($observer);
    public function removeObderver($id);
    public function notifyObderver();
}
