<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\StudentGroup */
?>
<div class="student-group-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           
            [
                'attribute' => 'Student name',
                'format' => 'raw',
                 'value' => $model->student->displayname,
            ],
           
            [
                'attribute' => 'Course name',
                'format' => 'raw',
                 'value' => $model->course->title,
            ],
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
