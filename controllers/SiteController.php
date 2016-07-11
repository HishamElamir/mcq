<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\StudentGroups;
use app\modules\admin\models\Notes;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            /*
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => [
                            'logout' => ['post']
                            ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
             * 
             */
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
       
     return $this->render('index',['count' => $this->DataCount()]);
    }

    

    public function actionLogout()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        Yii::$app->user->logout();

        return $this->goHome();
    }
 

    public function actionAbout()
    {
        return $this->render('about');
    }

   
    
    
     

      /**
     * @param void
     * @return count all files  
     */
    protected function DataCount()
    {
        return $count = array(
            'Totlal' => 250 , 
            'Token' => 200,
            'Available' => 50,
        ); 
        
    }
}
