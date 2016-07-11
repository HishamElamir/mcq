<?php

namespace app\modules\auth\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\modules\auth\models\ForgetForm;



class ResetController extends Controller
{
    public function actionIndex()
    {
          if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
     

        
        $model = new ForgetForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
             return $this->render('result', [
            'user' => $model->M_user(),
        ]);
            return $model->key();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
       
    }


    

}
