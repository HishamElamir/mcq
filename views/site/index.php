<?php

/* @var $this yii\web\View */
use yii\bootstrap\Progress;
use yii\bootstrap\Alert;
use yii\helpers\Html;
$this->title =  Yii::t('app', 'MCQ System') ;
 ?>
</div>

 <section class="section1">

<div class="row">
 
      <div class="col-sm-8">
 
        <h1 style="color: #fff;">
        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
          For Educations :)
        </h1>
        <div class="col-sm-4">
           <p>
       
<b>General Knowlegde </b>

Here you will find Online General Knowledge Quiz Questions and Answers for Competitive Exam.This section covers various GK topics like Famous persons, Books and Authors, Countries and capitals etc.

     </p>   

    
        </div>   <div class="col-sm-4">
           <p>
      
<b>Computer Science </b>

Here you will find all the questions in form of multiple choice related to all computer subjects like Data Structure,Digital Logic, Operating Systems etc.

     </p>   

     
        </div>

           <div class="col-sm-4">
            <p>
           <b>
       Previous Examinations
     </b>  This section is loaded with all the competitive exam papers(fully solved)that were held previously. Amendments to this sections will be made timely.
     </p> 
        </div>
     

     <div class="row" >
      
         <?= Html::a(Yii::t('app', 'Post your jobs'), ['/jobs'], ['class'=>'btn btn-success']) ?>
         <?= Html::a(Yii::t('app', 'Sale your software'), ['/shop'], ['class'=>'btn btn-danger']) ?>
        
    </div>

      </div>
  <div class="col-sm-4 hidden-xs">
  <div id="slideshow">
   <div>
         <?= Html::img('@web/images/site/eliminate-theft.png', ['alt'=>'some', 'class'=>'img-responsive']);?>
   </div>
   <div>
        <?= Html::img('@web/images/site/increase-revenue.png', ['alt'=>'some', 'class'=>'img-responsive']);?>
   </div>

   <div>
        <?= Html::img('@web/images/site/carding-fraud.png', ['alt'=>'some', 'class'=>'img-responsive']);?>
   </div>

   <div>
        <?= Html::img('@web/images/site/native-sdk.png', ['alt'=>'some', 'class'=>'img-responsive']);?>
   </div>
    
</div>
  
</div>
</section>  



 
  <div class="mid">
     <div class="row">
         <div class="col-sm-3">
          <h1 class="count"><?php echo $count['Totlal']; ?></h1>
          <div class="_info"><?= Yii::t('app', 'Total Files') ?></div>
        </div>

    <div class="col-sm-3">
          <h1 class="count"><?php echo $count['Available']; ?></h1>
          <div class="_info"><?= Yii::t('app', 'Available Files') ?></div>
        </div>

    <div class="col-sm-3">
          <h1><?php echo $count['Token']; ?></h1>
          <div class="_info"><?= Yii::t('app', 'token Files') ?></div>
        </div>
         <div class="col-sm-3">
          <h1><?php echo $count['Token']; ?></h1>
          <div class="_info"><?= Yii::t('app', 'token Files') ?></div>
        </div>
     </div>

  </div> 

<div class="container">
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
    <hr>


     <div class="row">
  
    <div class="col-sm-6">
      <h2>Improve your career.</h2>
      <p>Try to look at the results of your experiment with a critical eye. Ask yourself these questions: </p>
      <ul>
        
         <li>Is it complete, or did you forget something? </li>
          <li>Do you need to collect more data? </li>
           <li>Did you make any mistakes?</li>
         
      </ul>
    </div>
      <div class="col-sm-6">
      <?= Html::img('@web/images/site/new-account-fraud.png', ['alt'=>'some', 'class'=>'img-responsive']);?>
    </div>
  </div>
 </div>
 


</div> 
 
 