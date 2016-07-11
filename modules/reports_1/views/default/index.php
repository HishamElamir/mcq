<?php

/* @var $this yii\web\View */
use yii\bootstrap\Progress;
use yii\bootstrap\Alert;
use yii\helpers\Html;
$this->title =  Yii::t('app', 'MCQ Reports') ;
$string = "Hello " . Yii::$app->user->identity->username  . " :  System Reporting enables Institutions to do robust reporting to understand how their system is being used. ";
echo Alert::widget([
    'options' => [
        'class' => 'alert-info',
    ],
    'body' => $string ,
]);
 ?>

 <div class="row">
    <div class="col-sm-6">
      <?= Html::img('@web/images/site/gain-insight.png', ['alt'=>'some', 'class'=>'img-responsive']);?>
    </div>
    <div class="col-sm-6">
      <h2>Review your data.</h2>
      <p>Try to look at the results of your experiment with a critical eye. Ask yourself these questions: </p>
      <ul>
        
         <li>Is it complete, or did you forget something? </li>
          <li>Do you need to collect more data? </li>
           <li>Did you make any mistakes?</li>
         
      </ul>
    </div>

  </div>
