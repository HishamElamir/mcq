<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Exams */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exams-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>You have 2 Hour to solve the exam</p>
    <hr />

    
    <?php $i = 0; ?>
    <?php $form = ActiveForm::begin(); ?>
    <?php foreach ($questions as $question){ ?>
    
    <h2><?= $question['id'] ?><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> <?php print_r($question['q_title']); ?></h2>
    
    <p>A<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <?php print_r($question['ans_a']) ?></p>
    <p>B<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <?php print_r($question['ans_b']) ?></p>
    <p>C<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <?php print_r($question['ans_c']) ?></p>
    <p>D<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <?php print_r($question['ans_d']) ?></p>
    <p>E<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <?php print_r($question['ans_e']) ?></p>
    
    <div class="col-lg-6">
        <select class="form-control" name="QuestionSolved[<?= $question['id'] ?>]">
            <option value="<?= 'a' ?>"><?= $question['ans_a'] ?></option>
            <option value="<?= 'b' ?>"><?= $question['ans_b'] ?></option>
            <option value="<?= 'c' ?>"><?= $question['ans_c'] ?></option>
            <option value="<?= 'd' ?>"><?= $question['ans_d'] ?></option>
            <option value="<?= 'e' ?>"><?= $question['ans_e'] ?></option>
        </select>
    </div>
    <div class="clearfix"></div>
    <?php } ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit answers'), ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
