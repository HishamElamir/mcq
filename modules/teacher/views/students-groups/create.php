<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\StudentGroup */

?>
<div class="student-group-create">
    <?= $this->render('_form', [
        'model' => $model,
        'group_id' => $group_id,
    ]) ?>
</div>
