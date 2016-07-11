<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Group;

$this->title = 'Student Control';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-student">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--    Adding new Contents -->
    <?php if(Yii::$app->session->hasFlash('consol_v_error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('consol_v_error') ?>
        </div>
    <?php endif; ?>
    <?php if(Yii::$app->session->hasFlash('consol_v_info')): ?>
        <div class="alert alert-info" role="alert">
            <?= Yii::$app->session->getFlash('consol_v_info') ?>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <section  class="col-lg-7 connectedSortable">
            <div class="col-lg-12">
                <?php    foreach ($data as $d){ 
                                foreach ($d as $note){
                    ?>
                <div class="alert alert-info">
                    <?php 
                    $groupId = array_search($d, $data);
                    $groupName = Group::find()->where(['id' => $groupId])->one();
                    echo $groupName['title'];
                    ?>
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    <?php
                    echo $note;
                    ?>
                </div>
                <hr/>
                <?php   } 
                    }
                ?>
                <!--    aside with all groups    -->
            </div>
        </section>
        <section  class="col-lg-5 connectedSortable">
            <div class="col-lg-12">
                <h2>Groups</h2>
                <?php foreach ($groups as $id => $group){   ?>
                    <?php foreach ($group as $name => $desc){   ?>
                        <a href="<?= \yii\helpers\Url::to('?r=student/default/group-view&id='.$id)?>">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="info-box">
                                  <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number"><?= $name ?></span>
                                    <span class="info-box-text"><?= $desc ?></span>
                                  </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div><!-- /.col -->
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
        </section>
    </div><!--   end of Row   -->
    
    
</div>


