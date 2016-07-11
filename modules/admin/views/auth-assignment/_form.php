<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\User;
use app\modules\admin\models\AuthItem;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class="col-sm-6">
    		 <?= $form->field($model, 'item_name')->dropDownList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name')) ?>
    	</div>
    	<div class="col-sm-6">
    		<?php 
    echo $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'), 
         ['prompt'=>'UserName']) ?>
    	</div>
    </div>

   
     

     
    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
