<?php

namespace app\modules\teacher\controllers;


use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helperFactory
 *
 * @author wolf
 */
class helperFactory {
    
    private function __construct(){}
    private function __clone() {}
    
    public static function getModel($helperName){
        if($helperName == null){
            return null;
        }elseif($helperName == "array"){
            return new ArrayHelper();
        }elseif ($helperName == "url") {
            return new Url();
        }elseif ($helperName == "html") {
            return new Html();
        }
    }
    
    public function arrayFactory($array, $from, $to){
        return ArrayHelper::map($array, $from, $to);
    }
}
