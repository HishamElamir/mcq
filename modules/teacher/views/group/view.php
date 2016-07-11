<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Group */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="group-view">

    <div class="group-details">

    </div>

    <h3><?= Html::encode($this->title) ?></h3>

   
    
    <p>
        

        
        <?=
        Html::a('<i class="glyphicon glyphicon-remove"></i>', ['delete', 'id' => $model->id], [
            'class' => 'pull-right btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i>', ['update', 'id' => $model->id], ['class' => 'pull-right btn btn-default']) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'course_id',
            'created_at',
            'updated_at',
        ],
    ])
    ?>



</div>
