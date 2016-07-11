<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\teacher\models\StudentrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

   


    <h3>your students</h3>
    <p class="pull-right">

        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['student/create' ], ['title' => 'Create new student', 'class' => 'btn btn-default'])
        ?>

    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
