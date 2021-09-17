<?php

use app\models\Libraries;
use PharIo\Manifest\Library;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Books */
// /* @var $form yii\widgets\ActiveForm */
// use dosamigos\datepicker\DatePicker;
use app\models\User;
// use kartik\date\DatePicker;
use yii\jui\DatePicker;

date_default_timezone_set("Asia/Calcutta");   
$pdate= date('Y-m-d');

?>



<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_title')->textInput(['maxlength' => true ]) ?>


    
    <?= $form->field($model, 'library_id')->dropDownList(
        ArrayHelper::map(Libraries::find()->all(),'Library_name','Library_name'),
        ['prompt' => 'select Library']

        
    )
    
    ?>



    <?= $form->field($model, 'author_id')->dropDownList(
        ArrayHelper::map(User::find()->all(),'username','username'),
        ['prompt' => 'select Library'],
        
    )
    
    ?>







    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
