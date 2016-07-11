<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\MyAppAsset;
use app\helper\Constants;
use yii\bootstrap\Nav;

AppAsset::register($this);
MyAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script type="text/javascript">


            function deleteNotification() {

                var notifdelete = $('#notfiDelete');
                var id = notifdelete.attr('value_id');

                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/notification/delete&id=' ?>' + id,
                    type: 'post',
                    // dataType: 'json',
                    data: {notifyId: id},
                    success: function (data) {
                        if (data == true) {
                            alert("Done , you deleted the notification successfully .");
                        }

                    }

                });
            }

            function notify() {
                $(document).ready(function () {
                    $('#notifications-body').html('');
                    $('#notifications-body').append(
                            '<li>'
                            + '<h4 style="margin-left: 30px;">there are no any notifications </h4>'
                            + '</li>');
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/notification/index&id=11' ?>',
                        success: function (data) {


                            var unRead = data.unReadIds;
                            var notifys = data.notifications;
                            var teacher = data.teacher;
                            var student = data.student;


                            $('#notifications-body').html('');
                            for (i = 0; i < notifys.length; i++) {
                                var group = notifys[i].group;
                                var text = notifys[i].text;
                                var exam = notifys[i].exam;
                                var notifyId = notifys[i].id;

                                // alert(exam.name);

                                $('#notifications-body').append(
                                        '<li>'
                                        + '<a href="#">'
                                        + '<div class="pull-left">'
                                        + '<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">'
                                        + '</div>'
                                        + '<h4>'
                                        + teacher.displayname
                                        + '<small><i class="fa fa-clock-o"></i> 5 mins</small>'
                                        + '<button id = "notfiDelete" value_id = "' + notifyId + '" onclick = "deleteNotification()"type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true" >&times; </button>'
                                        + '</h4>'
                                        + '<p>' + 'my Student (' + student.displayname + ') ' + text + ' (' + exam.name + ')</p>'
                                        + '</a>'
                                        + '</li>');
                            }

                            var ids = [];
                            for (i = 0; i < unRead.length; i++) {

                                ids[i] = unRead[i].id;

                            }
                            setRead(ids);

                        }

                    });
                });
            }

            function setRead(ids) {

                $.ajax({
                    url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/notification/set-read' ?>',
                    type: 'post',
                    data: {notifyIds: ids},
                    success: function (data) {
                        var notifyIcon = $('#notif_numbers');
                        if (data === 1) {
                            notifyIcon.removeClass('label-danger');
                            notifyIcon.addClass('label-success');
                            notifyIcon.css("color", "none");
                        }
                        //alert(data);
                    }

                });

            }

            function countNotifications() {
                $.ajax({
                    type: 'GET',
                    // dataType: 'json',
                    url: '<?php echo Yii::$app->request->baseUrl . '/index.php?r=teacher/notification/count-notifications&id=11' ?>',
                    success: function (data) {
                        var notifyIcon = $('#notif_numbers');
                        if (data > 0) {
                            notifyIcon.removeClass('label-success');
                            notifyIcon.addClass('label-danger');
                            notifyIcon.css("color", "red !important");
                            notifyIcon.html(data);
                        }
                        else {
                            notifyIcon.removeClass('label-danger');
                            notifyIcon.addClass('label-success');
                            notifyIcon.css("color", "none");
                        }

                        //alert(data);

                    }

                });

            }



            setInterval(countNotifications, 500);
        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php $this->beginBody() ?>


        <header class="main-header navbar-default">
            <!-- Logo -->

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top navbar-fixed-top navbar-default" role="navigation">
                <!-- Sidebar toggle button-->

                <div class="navbar-custom-menu navbar-right">
                    <ul class="nav navbar-nav">

                        <?php
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
                            ?>

                            <li class="dropdown user user-menu">



                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo Yii::$app->user->identity->username ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo Yii::$app->user->identity->username ?>
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <?php echo Html::a('Profile', ['/auth/account'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']); ?>
                                        </div>
                                        <div class="pull-right">
                                            <?php echo Html::a('Sign out', ['/auth/login/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']); ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <?php
                            if (\Yii::$app->user->can('teacher')) {
                                echo Nav::widget([
                                    'options' => ['class' => 'navbar-nav navbar-right'],
                                    'items' => [
                                        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
                                        ['label' => 'Help', 'url' => ['/site/about']],
                                        ['label' => Yii::t('app', 'Authorization'), 'items' => [
                                                ['label' => Yii::t('app', 'My Account'), 'url' => ['/auth/account']],
                                                ['label' => Yii::t('app', 'Change Password'), 'url' => ['account/changepassword']],
                                            ]
                                        ],
                                        ['label' => Yii::t('app', 'Activities'), 'items' => [
                                                ['label' => Yii::t('app', 'Groups'), 'url' => ['/teacher/group']],
                                                ['label' => Yii::t('app', 'Exams'), 'url' => ['/teacher/exam']],
                                                ['label' => Yii::t('app', 'Reports'), 'url' => ['/reports/teacher-reports']],
                                                ['label' => Yii::t('app', 'Payment'), 'url' => ['/teacher/paypal']],
                                            ]
                                        ],
                                    ],
                                ]);
                            }
                            if (\Yii::$app->user->can('student')) {
                                echo Nav::widget([
                                    'options' => ['class' => 'navbar-nav navbar-right'],
                                    'items' => [
                                        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
                                        ['label' => 'Help', 'url' => ['/site/about']],
                                        ['label' => Yii::t('app', 'Authorization'), 'items' => [
                                                ['label' => Yii::t('app', 'My Account'), 'url' => ['/auth/account']],
                                                ['label' => Yii::t('app', 'Change Password'), 'url' => ['account/changepassword']],
                                            ]
                                        ],
                                        ['label' => Yii::t('app', 'Activities'), 'items' => [
                                                ['label' => Yii::t('app', 'Groups'), 'url' => ['/student/default/index']],
                                                ['label' => Yii::t('app', 'Reports'), 'url' => ['/reports/student-reports']],
                                            ]
                                        ],
                                    ],
                                ]);
                            }
                            ?>

                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu" id = "notifications">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="notify()">
                                    <i class = "fa fa-envelope-o"></i>
                                    <span class="label label-success" id = "notif_numbers"></span>
                                </a>
                                <ul class="dropdown-menu"  style="width:500px;">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu" id = "notifications-body" style="width:100%;">

                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                        <?php }
                        ?>

                    </ul>
                </div>

                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>


                <?php echo Html::a('MCQ EXAMS', ['/site/index'], ['data-method' => 'post', 'class' => 'navbar-brand navbar-right']); ?>
            </nav>
        </header>
        <div class="wrap">
            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>


            </div>

        </div>


        <?= $this->render('footer') ?>



        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
