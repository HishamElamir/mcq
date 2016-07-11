<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\QuestionSolved */

$this->title = Yii::t('app', 'Create Question Solved');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Question Solveds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-solved-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
