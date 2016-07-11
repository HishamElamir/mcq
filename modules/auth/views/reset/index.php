<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','reset password');
$this->params['breadcrumbs'][] = "Authentication";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
 <?php
   $form = ActiveForm::begin(['id' => 'forget-form', ]); ?>
 
  <fieldset> 
    <?= $form->field($model, 'email')->textInput(array('placeholder' => 'Email'));  ?>
  </fieldset>
  <br>
   <fieldset> 
    <div class="form-group">
    <?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
   </div>
    </fieldset>
   <?php ActiveForm::end(); ?>
</div>

