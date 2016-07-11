<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\GroupExams */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Group Exams',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Exams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="group-exams-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
