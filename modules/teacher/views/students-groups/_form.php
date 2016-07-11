<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\StudentGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'student_id')->dropDownList(
            yii\helpers\ArrayHelper::map(
                    \app\Modules\teacher\models\Student::find()->where(['user.role' => 30])->all()
                            , 'id', "displayname")
            , ['prompt' => 'Select student'])
    ?>


  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
