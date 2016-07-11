<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\models\Role;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'Create New Account');
$this->params['breadcrumbs'][] = "authorization";
$this->params['breadcrumbs'][] = $this->title;
?>

<body>
    <div class="row">
        <div class="col-lg-12">
            <div style="width: 600px; margin: 0px auto;">
                <div class="register-box col-sm-4">
                    <div class="register-logo">
                        <a href="../../index2.html">mc<b>Q</b>uizzes</a>
                    </div>

                    <div class="register-box-body">
                        <p class="login-box-msg">Register a new membership</p>
                        <?php
                        $form = ActiveForm::begin(
                                        ['id' => 'form-signup']);
                        ?>

                        <?=
                        $form->field($model, 'username', ['options' => [
                                'tag' => 'div',
                                'class' => 'form-group field-loginform-username has-feedback required'
                            ],
                            'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'
                        ])->textInput(['placeholder' => 'Username'])
                        ?>


                        <?=
                        $form->field($model, 'email', ['options' => [
                                'tag' => 'div',
                                'class' => 'form-group field-loginform-email has-feedback required'
                            ],
                            'template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>{error}{hint}'
                        ])->textInput(['placeholder' => 'Email'])
                        ?>

                        <?=
                        $form->field($model, 'password', ['options' => [
                                'tag' => 'div',
                                'class' => 'form-group field-loginform-username has-feedback required'
                            ],
                            'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                        ])->passwordInput(['placeholder' => 'Password'])
                        ?>

                        <?=
                        $form->field($model, 'password_repeat', ['options' => [
                                'tag' => 'div',
                                'class' => 'form-group field-loginform-username has-feedback required'
                            ],
                            'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'
                        ])->passwordInput(['placeholder' => 'Repeat password'])
                        ?>

                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-xs-4">
                                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                            </div><!-- /.col -->
                        </div>
                        <?php ActiveForm::end(); ?>

                        <div class="social-auth-links text-center">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
                            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
                        </div>

                        <?= Html::a('Already have an account', ['/auth/login'], ['class' => 'text-center']) ?>
                    </div><!-- /.form-box -->
                </div><!-- /.register-box -->
            </div>
        </div>
    </div>


    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

</body>




