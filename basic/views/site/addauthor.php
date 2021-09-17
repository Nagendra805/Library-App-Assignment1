<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
// use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;

$this->title = 'Add Autor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact bg-dark text-light p-5">
    <h1 class='text-info text-center'><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

    

    <?php else: ?>

     

        <div class="row ">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin([
                      'id' => 'register-form',
                      'layout' => 'horizontal',
                      'fieldConfig' => [
                          'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                          'labelOptions' => ['class' => 'col-lg-2 control-label'],
                      ],
                    ]); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'email')->input('email') ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'password_repeat')->passwordInput() ?>

<?= $form->field($model, 'username')
           ->dropDownList(
            ['author','admin'],
            ['options']
        );
        ;?>

<div class="form-group text-center mt-5">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Add an new autor', ['class' => 'btn btn-outline-primary', 'name' => 'login-button']) ?>
    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
