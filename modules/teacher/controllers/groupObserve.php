<?php
namespace app\modules\teacher\controllers;
use yii\helpers\ArrayHelper;
use app\modules\teacher\models\Notification;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of groupObserve
 *
 * @author wolf
 */
class groupObserve implements \app\controllers\Observer {
    
    public static function update($id){
        //  Display(get)
        $notification = Notification::find()->where(['group_id' => $id])->all();
        return ArrayHelper::map($notification, 'user_id', 'text');
    }
}
