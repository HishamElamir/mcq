<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\GroupExams */

?>
<div class="group-exams-create">
    <?= $this->render('_form', [
        'model' => $model,
        'group_id' => $group_id
    ]) ?>
</div>
