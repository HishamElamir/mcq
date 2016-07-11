<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','Login');
$this->params['breadcrumbs'][] = "authentication";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login ">

    
    <div class="login-box col-sm-6">
      <div class="login-logo">
         
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form'
            ]); ?>
            
        
                <?= $form->field($model, 'username', ['options' => [
                        'tag' => 'div',
                        'class' => 'form-group field-loginform-username has-feedback required'
                    ],
                    'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'
                    ])->textInput(['placeholder' => 'Username']) ?>
                
                <?= $form->field($model, 'password', ['options' => [
                        'tag' => 'div',
                        'class' => 'form-group field-loginform-username has-feedback required'
                    ],
                    'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                    ])->passwordInput(['placeholder' => 'Password']) ?>
                
            
            <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </label>
                  </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div><!-- /.col -->
            </div>

    <?php ActiveForm::end(); ?>
        
       <div class="col-lg-offset-1" style="color:#999;">
   <strong>  Forgot Your Password? </strong><br>
To reset your password, click <a data-backdrop="static" data-keyboard="false"  data-toggle="modal" data-target="#ForgetPasswordModal" href="" >here</a>
    <br>
HelwanSoft will send New password to your email address then you have to change it. 

      </div>
</div>



<!-- Modal -->
<div id="ForgetPasswordModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Type your Email</h4>
      </div>
      <div class="modal-body">
        <?= $this->render('_forgetForm', [
        //'model' => $model,
    ]) ?>
      </div>
      
    </div>

  </div>
</div>
   
</div>
