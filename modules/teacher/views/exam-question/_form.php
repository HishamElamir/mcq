<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ExamsQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exams-questions-form">

<?php $form = ActiveForm::begin(); ?>
    
     <?php echo $form->field($model, 'question_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\modules\teacher\models\Question::find()
                    ->where(['teacher_id' => Yii::$app->user->id])->all(),
                    'id', 'q_title'), ['prompt' => 'Select question']);
//     echo $form->field($model, 'question_id')->dropDownList(
//            \yii\helpers\ArrayHelper::map(\app\modules\teacher\models\Question::find()
//                    ->join('inner join' , 'user' , 'question.teacher_id = '. Yii::$app->user->id)
//                    ->join('inner join' , 'exams_questions' , 'exams_questions.question_id <> question.id ')->all(),
//                    'id', 'q_title'), ['prompt' => 'Select question']);
     
    ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
<?php } ?>

<?php ActiveForm::end(); ?>

</div>
