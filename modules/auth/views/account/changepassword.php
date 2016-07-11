 <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','change password');
$this->params['breadcrumbs'][] = "authorization";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'My account'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
   <div class="col-sm-8">
 
 
    <h1><?= Html::encode($this->title) ?></h1>
   
    
    <?php $form = ActiveForm::begin([
        'id'=>'changepassword-form',
        'options'=>['class'=>'form-horizontal'],
        'fieldConfig'=>[
            'template'=>"{label}\n<div class=\"col-lg-4\">
                        {input}</div>\n<div class=\"col-lg-5\">
                        {error}</div>",
            'labelOptions'=>['class'=>'col-lg-3 control-label'],
        ],
    ]); ?>
<hr class="colorgraph">
        <?= $form->field($model,'oldpass')->passwordInput() ?>
       
        <?= $form->field($model,'newpass')->passwordInput() ?>
       
        <?= $form->field($model,'repeatnewpass')->passwordInput() ?>
       
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton(Yii::t('app','change password'),[
                    'class'=>'btn btn-warning'
                ]) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
 </div>
