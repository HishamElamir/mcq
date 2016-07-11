<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->beginContent('@app/modules/teacher/views/layouts/groupLayout.php');
?>

<?php
$groupId = $GLOBALS['groupIdGl'];
?>



<div class="row" >
    <div class="col-lg-12" style="padding: 10px; border-bottom: 1px solid #ccc; margin-bottom: 20px;">
        <?= Html::a('Students', ['students-groups/index', 'groupId' => $groupId], ['class' => 'pull-right btn btn-default', 'title' => 'Students']) ?>
        <?= Html::a('Exams', ['group-exams/index', 'groupId' => $groupId], ['class' => 'pull-right btn btn-default', 'title' => 'Exams']) ?>
    </div>

    <div class="row" style="padding: 20px;">
        <div class="col-lg-12">
             <?php echo $content; ?>
        </div>
       
    </div>
</div>

<?php $this->endContent(); ?>