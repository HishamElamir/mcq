<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">


    <div class="row">
        <div class="col-lg-5">
            <div class="">
                <?php echo $this->render('_formGroupExam', ['model' => $model]) ?>
            </div>
        </div>
        <div class="col-lg-7">
            
           
            <h3 >
                Questions in exam

            </h3>
            
            <p >
                <?php echo Html::a('<i class="glyphicon glyphicon-plus"></i>', ['question/create'], ['role' => 'modal-remote', 'title' => 'Create new Questions', 'class' => 'btn btn-default pull-right'])
                ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'q_title',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
    </div>







</div>



<?php
\yii\bootstrap\Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php \yii\bootstrap\Modal::end(); ?>
