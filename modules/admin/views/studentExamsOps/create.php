<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\StudentExamsOps */

$this->title = Yii::t('app', 'Create Student Exams Ops');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Exams Ops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-exams-ops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
