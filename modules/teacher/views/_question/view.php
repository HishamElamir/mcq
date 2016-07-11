<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Question */
?>
<div class="question-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'teacher_id',
            'q_title',
            'ans_a',
            'ans_b',
            'ans_c',
            'ans_d',
            'ans_e',
            'correct_ans',
            'description:ntext',
            'createed_at',
            'updated_at',
        ],
    ]) ?>

</div>
