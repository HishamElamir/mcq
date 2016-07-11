<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\GroupExams */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-exams-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'exam_id')->dropDownList(
            yii\helpers\ArrayHelper::map(
                    
            
                    \app\Modules\teacher\models\Exam::find()->where(['teacher_id' => Yii::$app->user->getId()])->all()
                            , 'id', "name")
            , ['prompt' => 'Select exam'])
    ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
