<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\QuestionSolved */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-solved-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'exam_question_id')->textInput() ?>

    <?= $form->field($model, 'answer')->dropDownList([ 'a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D', 'e' => 'E', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
