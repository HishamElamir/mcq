<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\Exam */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Exams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-view">

    <h3><?= Html::encode($this->title) ?></h3>



    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'est_date',
            'exam_grade_approval',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
