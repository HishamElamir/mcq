<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => 'MCQ System',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-default',
    ],
]);
if (Yii::$app->user->isGuest) {
    // user not logined
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => Yii::$app->homeUrl],
            ['label' => 'Help', 'url' => ['/site/about']],
            ['label' => 'Login', 'url' => ['/auth/login']],
        ],
    ]);
} else {
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => Yii::t('app', 'Logout') . '[ ' . Yii::$app->user->identity->username . ' ]',
                'url' => ['/auth/login/logout'],
                'linkOptions' => ['data-method' => 'post']
            ],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
            ['label' => 'Help', 'url' => ['/site/about']],
            ['label' => Yii::t('app', 'Authorization'), 'items' => [
                    ['label' => Yii::t('app', 'My Account'), 'url' => ['/auth/account']],
                    ['label' => Yii::t('app', 'Change Password'), 'url' => ['settings/changepassword']],
                ]
            ],
            ['label' => Yii::t('app', 'Activities'), 'items' => [
                    ['label' => Yii::t('app', 'Groups'), 'url' => ['/activities/groups']],
                    ['label' => Yii::t('app', 'Students'), 'url' => ['/activities/students']],
                    ['label' => Yii::t('app', 'Questions'), 'url' => ['/activities/questions']],
                    ['label' => Yii::t('app', 'Exams'), 'url' => ['/activities/exams']],
                    ['label' => Yii::t('app', 'Reports'), 'url' => ['/reports']],
                    ['label' => Yii::t('app', 'Teacher'), 'url' => ['/teacher/teacher']],
                ]
            ],
        ],
    ]);
}
NavBar::end();
?>