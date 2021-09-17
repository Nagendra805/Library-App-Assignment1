<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\base\Model;
// use kartik\time\TimePicker;
// use kartik\datetime\DateTimePicker;
use dosamigos\datetimepicker\DateTimePicker;
// use janisto\timepicker;
use janisto\timepicker\TimePicker;


date_default_timezone_set("Asia/Calcutta");   
$ptime= date('H:i');

/* @var $this yii\web\View */
/* @var $model app\models\Libraries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libraries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Library_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'opening_time')->widget(TimePicker::classname(), [
      'model' => $model,
      'attribute' => 'created_at',
      'mode' => 'time',
      'clientOptions'=>[
        //   'timeFormat' => 'HH:mm:ss',
        //   'showSecond' => false,
        'hour' => date('H'),
        'minute' => date('i'),
        'second' => date('s'),
      ]
        
     ])   ?>



    <?= $form->field($model, 'closing_time')->textInput(['class'=>'bg-red'])->widget(TimePicker::classname(), [
    'model' => $model,
    'attribute' => 'created_at',
    'mode' => 'time',
    'clientOptions'=>[
        'dateFormat' => 'yy-mm-dd',
        'timeFormat' => 'HH:mm:ss',
        'showSecond' => false,
    ]

    ]) ?>
 


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
