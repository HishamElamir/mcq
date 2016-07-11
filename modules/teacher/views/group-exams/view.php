<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\GroupExams */
?>
<div class="group-exams-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            
             [
                'attribute' => 'exam name',
                'format' => 'raw',
                 'value' => $model->exam->name,
            ],
            [
                'attribute' => 'group name',
                'format' => 'raw',
                 'value' => $model->group->title ,
            ],
            
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
