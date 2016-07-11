<?php
namespace app\modules\teacher\controllers;
use yii\helpers\ArrayHelper;

use Yii;
use groupObserve;
use studentObserve;
use app\modules\teacher\models\Notification;

class groupSubject implements \app\controllers\Subject{
   
    private $groupList = array();
    
    public function attach($observer){
        $this->groupList = $observer;
    }
    
    public function notifyAll(){
        
            //foreach ($this->groupList['Notes'] as $group)
            {
                $model = new Notification();

                $model->user_id = Yii::$app->user->getId();
                $model->group_id = $this->groupList['Notes']['group_id'];
                $model->text = "Teacher has add new content earlier!";
                $model->int_type = $this->groupList['Notes']['integration'];
                $model->int_id = $this->groupList['Notes']['int_id'];
                $model->save();
            }
    }
}

