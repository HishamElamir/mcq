<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use app\helper\Time;
use app\helper\Constants;
use yii\helpers\Html;

$this->title = "My Account";
$this->params['breadcrumbs'][] = "authorization";
$this->params['breadcrumbs'][] = $this->title;

?>



<div class="panel panel-default">
  <div class="panel-heading">
 <span style="float:right;" ><?php   echo  Html::a('Change Password', ['/auth/account/changepassword'], ['class' => 'btn btn-danger']); 
              ?></span>
  <h1><?= $this->title; ?></h1>

  </div>
  <div class="panel-body">
  <p>Details</p>
     <ul class="list-group">
  <li class="list-group-item">Username :  <?= Yii::$app->user->identity->username; ?></li>
  <li class="list-group-item">Email :  <?=  Yii::$app->user->identity->email ;?></li>
  <li class="list-group-item">Status : <?= Yii::$app->user->identity->status ?></li>
   <li class="list-group-item">Role : <?php if(Yii::$app->user->identity->role == Constants::ROLE_TEACHER)
                   {  echo "Teacher";
                   }             
     ?></li>
    <li class="list-group-item">Last seen : <?= Time::tsince(Yii::$app->user->identity->updated_at); ?></li>
     <li class="list-group-item">Registration time : <?= Time::tsince(Yii::$app->user->identity->created_at); ?></li>
</ul>

 

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
  Panel Content</div>
</div>

 <button data-toggle="collapse" data-target="#demo">Collapsible</button>

<div id="demo" class="collapse">
Lorem ipsum dolor text....
</div>