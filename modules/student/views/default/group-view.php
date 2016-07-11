<?php


use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\modules\teacher\controllers\helperFactory;
use app\modules\teacher\controllers\modelsFactory;
use app\modules\admin\models\Exams;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Group */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="group-view">

    <h1><?= helperFactory::getModel('html')->encode($this->title) ?></h1>

    
    <!-- Small boxes (Stat box) -->
    <div class="row">
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h3><?= modelsFactory::getModel('group-exams')->find()->where(['group_id' => $model['id']])->count()   ?></h3>
              <p>Total Exams</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= modelsFactory::getModel('stu-group')->find()->where(['course_id' => $model['id']])->count()   ?></h3>
              <p>Student Number</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
                <h3><?= modelsFactory::getModel('notes')->find()->where(['group_id' => $model['id']])->count()   ?></h3>
              <p>Total Notes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
    
    
    
    
    <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <h1>Posts</h1>
                <?php
                $groupNotes = modelsFactory::getModel('notes')->find()->where(['group_id' => $model['id']])->all();
                
                foreach ($groupNotes as $note){
                
                        ?>
                <div class="box box-widget">
                    <div class='box-header with-border'>
                      <div class='user-block'>
                        <?= helperFactory::getModel('html')->img(Yii::$app->request->baseUrl.'/dist/img/user1-128x128.jpg', ['alt' => 'user image', 'class' => 'img-circle'])?>
                        <span class='username'><a href="#"><?= modelsFactory::getModel('user')->findOne($note['user_id'])['displayname']; ?></a></span>
                        <span class='description'><?= $note['created_at'] ?></span>
                      </div><!-- /.user-block -->
                      <div class='box-tools'>
                        <button class='btn btn-box-tool' data-toggle='tooltip' title='Mark as read'><i class='fa fa-circle-o'></i></button>
                        <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                        <button class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
                      </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <!-- post text -->
                        <p><?= $note['message'] ?></p>
                        <!-- Attachment -->
                        <?php if ($note['integration'] == 'exams') {
                                $exam = modelsFactory::getModel('exam')->findOne($note['int_id']);
                        ?>
                        <a href="<?= \yii\helpers\Url::to('exam-view?id='.$exam['id'])?>">
                        <div class="attachment-block clearfix">
                          <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                          <div class="attachment-pushed">
                            <h4 class="attachment-heading"><?= $exam['name'] ?></h4>
                            <div class="attachment-text">Number of question: 
                                <?= modelsFactory::getModel('exam-ques')->find()->where(['exam_id' => $exam['id']])->count(); ?>
                            </div><!-- /.attachment-text -->
                          </div><!-- /.attachment-pushed -->
                        </div><!-- /.attachment-block -->
                        </a>
                        <?php   }   ?> 
                        
                        <!-- Social sharing buttons -->
                        <span class='pull-right text-muted'><?= \app\models\Comments::find()->where(['post_id' => $note['id']])->count() ?> comments</span>
                    </div><!-- /.box-body -->
                    <div class='box-footer box-comments'>
                        <?php yii\widgets\Pjax::begin(); ?>
                        <?php $allComments = helperFactory::getModel('array')->map(\app\models\Comments::findAll(['post_id' => $note['id']]), 'id', 'comment');
                        ?>
                        <?php foreach( $allComments as $key => $value ){ ?>
                            
                            <div class='box-comment'>
                                <!-- User image -->
                                <?= helperFactory::getModel('html')->img(Yii::$app->request->baseUrl.'/dist/img/user4-128x128.jpg', ['alt' => 'user image', 'class' => 'img-circle  img-sm'])?>
                                <div class='comment-text'>
                                    <span class="username">
                                        <?php $userId = \app\models\Comments::findOne(['id' => $key])['user_id']; ?>
                                        <?= \app\Modules\teacher\models\Student::findOne(['id' => $userId])['username']?>
                                        <span class='text-muted pull-right'></span>
                                    </span><!-- /.username -->
                                    <?= $value ?>
                                </div><!-- /.comment-text -->
                            </div><!-- /.box-comment -->
                            
                        <?php } ?>
                        <?php yii\widgets\Pjax::end() ?>
                    </div><!-- /.box-footer -->
                    <div class="box-footer">
                        
                        <?php $form = ActiveForm::begin(['id' => $comment->formName()]); ?>
                            <?= helperFactory::getModel('html')->img(Yii::$app->request->baseUrl.'/dist/img/user4-128x128.jpg', ['alt' => 'user image', 'class' => 'img-responsive img-circle  img-sm'])?>
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="hidden" id="comments-post_id" class="form-control" name="Comments[post_id]" value="<?= $note['id']?>">
                                <?= $form->field($comment, 'comment')->textInput() ?>
                                <!--<input type="text" class="form-control input-sm" placeholder="Press enter to post comment">-->
                            </div>
                        <?php ActiveForm::end(); ?>
                        
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
                
                <?php } ?>
                
            </section>
    
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
                <h1>Exams</h1>
                <!--    Code Here   -->
                <?php 
                    //  get all exams for this group
                    $allExamsForThisGroup    = modelsFactory::getModel('group-exams')->find()->where(['group_id' => $model['id']])->all();
                    //  orgnize all exam for use
                    $allExamsForThisGroupOrg = helperFactory::getModel('array')->map($allExamsForThisGroup, 'id', 'exam_id');
                    //  print_r($allExamsForThisGroupOrg);
                    //  loop in each exam
                    foreach ($allExamsForThisGroupOrg as $examId){
                        
                        $examInfo  = Exams::find()->where(['id' => $examId])->andWhere(['status' => 'active'])->one();    //  Exam Information
                        //print_r($examInfo);
                        $numOfQuestionsInExam = modelsFactory::getModel('exam-ques')->find()->where(['exam_id' => $examId])->count(); //  Num of question in the exam
                        
                ?>
                
                <a href="<?= \yii\helpers\Url::to('?r=student/default/exam-view&id='.$examId)?>">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-number"><?=   $examInfo['name']   ?></span>
                            <span class="info-box-text"><?=   $numOfQuestionsInExam  ?> Questions</span>
                            <span class="info-box-text"><?= modelsFactory::getModel('student-exams')->find()->where(['exam_id' => $examInfo['id']])->count();    ?> Solved</span>
                          </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div><!-- /.col -->
                </a>
                    
                <?php
                    }   ?>
            </section>

</div>

    
<?php

$script = <<< JS
    $('form#{$comment->formName()}').on('beforeSubmit', function(e){
        var \$form = $(this);
        $.post(
            \$form.attr("action"),  //  serialize
            \$form.serialize()
        ).done(function(result){
            if(result == 1){
                $(document).find('#secondmodal').modal('hide');
                $.pjax.reload({container:'#commdity-grid'});
            }else{
                $(\$form).trigger("reset");
                $("#message").html(result.message);
            }
        }).fail(function(){
            console.log("server error");    
        });
        return false;
    });
JS;
$this->registerJs($script);
?>