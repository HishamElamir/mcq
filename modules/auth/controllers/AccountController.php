<?php

namespace app\modules\auth\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\modules\auth\models\User;
use app\modules\auth\models\PasswordForm;
class AccountController extends \yii\web\Controller
{
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
        return $this->render('index');
        
    }


        public function actionChangepassword(){
    		
    	$model = new PasswordForm;
    	$modeluser = User::find()->where([
    			'username'=>Yii::$app->user->identity->username
    	])->one();
    	 
    	if($model->load(Yii::$app->request->post())){
    		if($model->validate()){
    			try{
    				$newp = Yii::$app->security->generatePasswordHash($_POST['PasswordForm']['newpass']);
    				$modeluser->password_hash = $newp;
    
    				if($modeluser->save()){
    					Yii::$app->getSession()->setFlash(
    							'success','Password changed'
    					);
    					return $this->redirect(['index']);
    				}else{
    					Yii::$app->getSession()->setFlash(
    							'error','Password not changed'
    					);
    					return $this->redirect(['index']);
    				}
    			}catch(Exception $e){
    				Yii::$app->getSession()->setFlash(
    						'error',"{$e->getMessage()}"
    				);
    				return $this->render('changepassword',[
    						'model'=>$model
    				]);
    			}
    		}else{
    			return $this->render('changepassword',[
    					'model'=>$model
    			]);
    		}
    	}else{
    		return $this->render('changepassword',[
    				'model'=>$model
    		]);
    	}
    }

}
