<?php

namespace app\modules\auth\controllers;
use Yii;
use app\modules\auth\models\SignupForm;
 

class NewController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        //$this->layout = 'guestLayout';
        $model = new SignupForm();
        
        if ($model->load(Yii::$app->request->post())) {
            print_r(Yii::$app->request->post());
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
             return $this->render('index', [
                'model' => $model,
        ]);
    }



}
