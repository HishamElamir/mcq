<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\helper\Constants;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body> 
</div>
<?php $this->beginBody(); ?>
<section class="header color-background ">
    <div class="container">
      <div class="row">
    
    <!-- <span class="txt-rotate" data-period="2000" data-rotate='[ "عايز شغل بجد.", "simple.", "عايز شغل بجد.", "pretty.", "fun!" ]'></span> -->
        </div>
    </div>
</section>

<div class="wrap">
  <?php
  $font_home = '<i class=\"fa fa-home\"></i>';
	//echo $font_home;
    NavBar::begin( );
     echo Nav::widget([
    			'options' => ['class' => 'navbar-nav navbar-right'],
    			'items' => [
                ['label' => Yii::t('app', 'Home') , 'url' => ['/site/index']],
    					['label' => Yii::t('app', 'users community'), 'url' => ['/users/index']],    
    					['label' => Yii::t('app', 'Jobs'), 'url' => ['/jobs/index']],
                        ['label' => Yii::t('app', 'Post Your Job'), 'url' => ['/jobs/create']],
    			],
    	]);
    if(Yii::$app->user->isGuest){	
    	echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-left     borderright'],
			'items' => [

				  ['label' => Yii::t('app', 'signup'), 'url' => ['/site/signup']],
				['label' => Yii::t('app', 'login'), 'url' => ['/site/login']], 
			],
		]);
    } 
    // USER NOT LOGINNED

    else {
    	 
      echo Nav::widget([
    			'options' => ['class' => 'navbar-nav navbar-left active'],
    			'items' => [ 
    					[
    					'label' => Yii::t('app', 'Logout') ,
    					'url' => ['/site/logout'],
    					'linkOptions' => ['data-method' => 'post','class'=>'l'],
                       // 'options'=>['class'=>'btn btn-danger']
    					],
    						
    			],
    	]);  ?>
   <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?= Yii::$app->user->identity->username; ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="text-center">
                                            <span class="fa fa-user fa-5x"></span>
                                        </p>
                                    </div>
                                    <div class="col-sm-8">
                                      <p class="text-left">
                                            <a href="<?= Url::toRoute('/account/index'); ?>" class="btn btn-primary btn-block btn-sm"><?= Yii::t('app', 'Account Sitting'); ?></a>
                                        </p>
                                      <p class="text-left">
                                            <a href="<?= Url::toRoute('/account/profile'); ?>" class="btn btn-primary btn-block btn-sm"><?= Yii::t('app', 'Update My Profile'); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
            
                    </ul>
                </li>
            </ul>
   <?php } // end Else 
  NavBar::end();
?>
 
<div class="container">
  
   <div class="col-sm-2">
        <div class="list-group">
  <a href="<?= Url::toRoute('/admin'); ?>" class="list-group-item active">
  <?= Yii::t('app', 'Home');?>
  </a>
  <a href="<?= Url::toRoute('/admin/jobs'); ?>" class="list-group-item">
<?= Yii::t('app', 'Jobs');?>
  </a>
  <a href="<?= Url::toRoute('/admin/place'); ?>" class="list-group-item">
<?= Yii::t('app', 'Places');?>
  </a>
   <a href="<?= Url::toRoute('/admin/terms'); ?>" class="list-group-item">
 <?= Yii::t('app', 'terms');?>
  </a>
  <a href="<?= Url::toRoute('/admin/profile'); ?>" class="list-group-item">
   <?= Yii::t('app', 'Profiles');?>
  </a>
   <a href="#" class="list-group-item">
   Dapibus ac facilisis in
  </a>
  <a href="#" class="list-group-item">Morbi leo risus
  </a>
</div>
   </div> 
   <div class="col-sm-10 block">
       <?= $content ?>
   </div>
 
   </div>
</div> 

 
 
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>