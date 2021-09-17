<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Author */
/* @var $form yii\widgets\ActiveForm */
// $autho_key =password_hash(bin2hex(rand(100,10000)), PASSWORD_BCRYPT);
// $access_key =password_hash(bin2hex(rand(100,10000)), PASSWORD_BCRYPT);

?>

<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->widget(
    DatePicker::className(), [
        'options' => ['style'=>'width:100%;', 'class' => 'form-control',],
        'clientOptions' => [
            'defaultDate' => '2014-01-01',
		    'autoclose' => true,
		    'todayHighlight' => true,
        ],
        'dateFormat' => 'yyyy-MM-dd',
        

        
    ]
);?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true , 'value'=>'']) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true,'value'=>'' , 'hidden'=>'hidden']) ->label(false) ?>

    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true,'value' => '','hidden'=>'hidden']) ->label(false) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'role')
           ->dropDownList(
            ['author'=>'author'
            ,'admin' => 'admin'
        ],
            ['options']
        );
        ;?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
