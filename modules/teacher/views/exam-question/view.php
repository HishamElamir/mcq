<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\ExamsQuestions */
?>
<div class="exams-questions-view">

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           [
                'attribute' => 'Question name',
                'format' => 'raw',
                 'value' => $model->question->q_title ,
            ],
             [
                'attribute' => 'exam name',
                'format' => 'raw',
                 'value' => $model->exam->name,
            ],
        ],
    ])
    ?>

</div>
