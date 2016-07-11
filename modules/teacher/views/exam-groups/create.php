<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\GroupExams */

$this->title = Yii::t('app', 'Create Group Exams');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Group Exams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-exams-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
