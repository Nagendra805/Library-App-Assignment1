<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Books;


/* @var $this yii\web\View */
/* @var $model app\models\Libraries */

$this->title = $model->Library_name;
$this->params['breadcrumbs'][] = ['label' => 'Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="libraries-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

<?php if (!Yii::$app->user->isGuest): ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php endif; ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'id',
            'Library_name',
            'opening_time',
            'closing_time',
            'created_date',
            'updated_date',


            [
                'label' => 'No of books',
                'attribute' => 'library_name',
                'value' => function($model){

                    // print_r($model->id);

                    $noofbooks = Books::find()->where(['library_id'=>$model->id])->all();

                //    return $noofbooks;
            //   echo '<pre/>';
            //     print_r($noofbooks[1]['book_title']);
                      

                return count($noofbooks);

                }
            ],

            [
                'label' => 'Books',
                'attribute' => 'library_name',
                'value' => function($model){
                    $noofbooks = Books::find()->where(['library_id'=>$model->id])->all();

                //    return $noofbooks;
            //   echo '<pre/>';
                // print_r($noofbooks[1]['book_title']);
                      
                $blenth=count($noofbooks);
                
                for($i=0;$i<$blenth;$i++){

                    // return $noofbooks[$i]['book_title'];
                    $datas[$i]=$noofbooks[$i]['book_title'];
                    // print_r($datas);

                }
                //  print_r( $datas);

                if(isset($datas)){
                    return implode(" , ",$datas);
                }else{
                    return 'No books Published';
                }
                // return implode(",",$datas);
                }
            ],
            
        ],
    ]) ?>

</div>
