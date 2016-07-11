<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ExamsQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exams-questions-form">


    <div class="form-assign-exam">
        <?php $form = ActiveForm::begin(); ?>

        <?=
        $form->field($model, 'course_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(app\modules\teacher\models\Group::find()
                                ->join('right join', 'courses', 'group.department_id = courses.id')
                                ->join('inner join', 'user', 'courses.teacher_id = ' . Yii::$app->user->getId())->all(), 'id', 'title'), ['prompt' => 'Select group to assign this exam'])
        ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>


        <?php ActiveForm::end(); ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>
</div>
