<?php

namespace app\modules\auth\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
    	echo "string";
        //return $this->render('index');
    }

    public function actionLogout()
    {
    	echo "logout";
        Yii::$app->user->logout();
 		return $this->goHome();
    }
}
