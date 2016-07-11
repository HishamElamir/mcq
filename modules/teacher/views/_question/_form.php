<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->textInput() ?>

    <?= $form->field($model, 'q_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ans_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ans_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ans_c')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ans_d')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ans_e')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correct_ans')->dropDownList([ 'a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D', 'e' => 'E', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'createed_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
