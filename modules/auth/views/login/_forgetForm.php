  <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

   $form = ActiveForm::begin(['id' => 'forget-form', ]); ?>
 
  <fieldset> 
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="Type Your Email" type="text">
      </div>
    </div>
  </fieldset>
  <br>
   <fieldset> 
    <div class="form-group">
   			 <?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
   </div>
    </fieldset>
   <?php ActiveForm::end(); ?>