<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
// use yii\captcha\Captcha;
use yii\jui\DatePicker;

$this->title = 'SignUp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact bg-dark text-light p-5">
    <h1 class='text-info text-center'><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    
        <div >

    <?php else: ?>
<style>
    #register-form{
        /* background-color: red; */
        width: 100%;
        justify-content: center;
        align-items: start;
        flex-direction: column;
        /* border: 1px solid red;/ */
    }

   
</style>
     

        <div class="row ">
            <div class="col-lg-12" >
                <?php $form = ActiveForm::begin([
                      'id' => 'register-form',
                      'layout' => 'horizontal',
                      'fieldConfig' => [
                          'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                          'labelOptions' => ['class' => 'col-lg-2 control-label'],
                            // 'style' => "background-color:red",
                      ],
                    ]); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true ]) ?>

<?= $form->field($model, 'email')->input('email') ?>


<?= $form->field($model, 'date_of_birth')->widget(
    DatePicker::className(), [
        'options' => ['style'=>'width:100%;', 'class' => 'form-control col',],
        'clientOptions' => [
            'defaultDate' => '2014-01-01',
		    'autoclose' => true,
		    'todayHighlight' => true,
        ],
        'dateFormat' => 'yyyy-MM-dd',
        

        
    ]
);?>


<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'password_repeat')->passwordInput() ?>



<div class="form-group text-center mt-5">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('SignUp', ['class' => 'btn btn-outline-primary', 'name' => 'login-button']) ?>
    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>

</div>
</div>
