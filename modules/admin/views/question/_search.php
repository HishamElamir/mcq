<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'q_title') ?>

    <?= $form->field($model, 'ans_a') ?>

    <?= $form->field($model, 'ans_b') ?>

    <?php // echo $form->field($model, 'ans_c') ?>

    <?php // echo $form->field($model, 'ans_d') ?>

    <?php // echo $form->field($model, 'ans_e') ?>

    <?php // echo $form->field($model, 'correct_ans') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'createed_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
