<?php
namespace app\helper;

use Yii;    
use yii\helpers\Html;
use yii\helpers\Url;

     /* content 

    */
    public  $subject;
    public $body;
 
    public function sendRegistrationMail($user)
       {
    $this->subject =  Yii::t('app', 'Your new account should in HelwanSoft');
        $this->body = "Welcome : " . $user->username ."<br><hr>";
     $this->body .= Yii::t('app', 'Now you can watch and display Your Occupations Ali should Helwan in the areas of software and information technologies can. Of which require action on the window');
      
              $this->body .= "<br> authorization code : " .$user->auth_key;
       return Yii::$app->mailer->compose('layouts/html', ['content' => $this->body]
                )->setTo($user->email)
                ->setFrom(Yii::$app->params['newsEmail'])
                ->setSubject($this->subject)
               
                ->send();
        }
    public function sendApplyJob($job,$application)
    {
        $this->subject = Yii::t('app', 'Recived a new message about the ad on HelwanSoft') ." : ".$job->title;
    $this->body = Yii::t('app', 'message from').Html::a($application->user->username,'http://helwansoft.com'.Url::to(['users/profile','id' => $application->user->id])) ."</b> <br><br>";
            $this->body .= "<h3>".$application->msg ."</h3>";
            $this->body .= "<br>".yii::t('app','Date') . " :  " . $application->date; 
            return  Yii::$app->mailer->compose('layouts/html', ['content' => $this->body])
                ->setTo($job->email)
                ->setFrom($application->user->email)
                ->setSubject($this->subject)
                ->send();
    }

    public function sendJobToAllUsers($users,$job)
    {
              $this->subject = $job->title;
              $this->body = $job->title. ' ' .$job->description;
              $this->body .= "Place : " . $job->city0->name; 
              
              return  Yii::$app->mailer->compose()
                ->setTo($users)
                ->setFrom(Yii::$app->params['newsEmail'])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
    }

} 
