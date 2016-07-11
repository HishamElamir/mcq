<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'All your questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">
    <div class="row" >
        <div class="col-lg-12  " >

            <div id = "resultAssignQuestion">

            </div>

        </div>
    </div>

    <div class="row" >
        <div class="col-lg-12"  >

            <div style="padding:0px; border: 1px solid #ccc; width: 400px; border-radius: 5px;">
                <?php
                echo Html::dropDownList('exams', null, \yii\helpers\ArrayHelper::map(\app\modules\teacher\models\Exam::find()->where(['teacher_id' => Yii::$app->user->id])->all(), 'id', 'name'), ['class' => 'form-control', 'id' => 'examsSelection', 'prompt' => 'select exam']);
                ?>
            </div>

        </div>
    </div>


    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

    <p class="pull-right">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['question/create'], ['title' => 'Create new Question', 'class' => 'btn btn-default'])
        ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'q_title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>





</div>
<script>
//
//function assignQuest()
//    {
//    var keys = $('#w0').yiiGridView('getSelectedRows'); // returns an array of pkeys, and #grid is your grid element id
//    $.post({
//      url: '<?php //echo Yii::$app->request->baseUrl. '/index.php?r=teacher/question/assign-questions'          ?>',
//       dataType: 'json',
//       data: {keylist: keys},
//       success: function(data) {
//          if (data.status === 'success') {
//              alert('Total price is ' + data);
//          }
//       },
//    });
//
//}


    function assignQuest()
    {

        var keys = $('#w0').yiiGridView('getSelectedRows');
        var examid = $('#examsSelection').val();
//         alert(keys);
//        alert(examid);

        if (examid === '') {
            var alertresult = '<div id="w1" class="alert-danger alert fade in">' +
                    '<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true" >&times; </button>' +
                    'Sorry , select the exam first' +
                    '</div>';
        }

        else {
            if (typeof keys[0] === 'undefined' || keys[0] === null) {
                var alertresult = '<div id="w1" class="alert-danger alert fade in">' +
                        '<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true" >&times; </button>' +
                        'Sorry , choose the questions first' +
                        '</div>';

            }
            else {
                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/question/assign-questions' ?>',
                    type: 'post',
                    data: {keylist: keys,
                        examId: examid},
                    success: function (data) {
                        if (data === 'true') {

                            var alertresult = '<div id="w1" class="alert-success alert fade in">' +
                                    '<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true" >&times; </button>' +
                                    'Done, you assigned the questions successfully ' +
                                    '</div>';

                        }
                        else {
                            var alertresult = '<div id="w1" class="alert-danger alert fade in">' +
                                    '<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true" >&times; </button>' +
                                    'Sorry , the operation is failed' +
                                    '</div>';
                        }
                        $('#resultAssignQuestion').html(alertresult);
                    }

                });
            }
        }

        $('#resultAssignQuestion').html(alertresult);



    }
</script>

<div class="row">
    <div class="col-lg-12">
        <?php echo Html::a(Yii::t('app', 'submit'), null, ['onclick ' => 'assignQuest()', 'class' => 'btn btn-primary']); ?>
    </div>
</div>

