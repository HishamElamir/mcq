<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\admin\models\Exams;
use app\modules\teacher\models\Group;
use app\modules\teacher\models\Course;


$teacherCourse = Course::find()->where(['teacher_id' => Yii::$app->user->getId()])->one();
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Notes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_id')->dropDownList(
        ArrayHelper::map(Group::find()->where(['course_id' => $teacherCourse['id']])->all(), 'id', 'title'), ['prompt' => '']
        ) ?>

    <?php // $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'integration')->dropDownList([ 'exams' => 'Exams', 'No integration' => 'No integration',/* 'users' => 'Users', */], ['prompt' => '']) ?>

    <?= $form->field($model, 'int_id')->dropDownList(
        ArrayHelper::map(Exams::find()->where(['teacher_id' => Yii::$app->user->getId()])->all(), 'id', 'name'), ['prompt' => '']
        ) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
