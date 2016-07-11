<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ExamsQuestions */

$this->title = Yii::t('app', 'Create Exams Questions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exams Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exams-questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
