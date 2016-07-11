<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\teacher\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>


    <div class="row">
        <div class="col-lg-12">
            <div style="width: 300px; margin: 0px auto;">
                <?php $form = ActiveForm::begin(); ?>
                <?php //echo $form->field($model, 'displayname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

