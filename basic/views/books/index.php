<?php

use yii\helpers\Html;
use yii\grid\GridView;
// use fedemotta\datatables\DataTables;
use reine\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\models\Libraries;
use app\models\User;
use GuzzleHttp\Psr7\Query;


$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
// .......getting library name..............
// $model=new Libraries;

// echo '<pre>';
//  print_r($model);
?>

<!-- ...................................... -->


<!-- ..................................... -->
<div class="books-index">

    <h1 class="text-info text-center"><?= Html::encode($this->title) ?></h1>

<?php if (!Yii::$app->user->isGuest): ?>


    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-12">

    <?= DataTables::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            // Optional (only if you want to override the defaults)
            'tableOptions' => [
                'class' => 'table table-dark table-striped card-table table-vcenter text-nowrap datatable',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'book_title',
            // 'library_id',

           


            'created_date',
            'updated_date',
            // 'author_name',
            //'author_date_of_birth',

            // ['class' => 'yii\grid\ActionColumn'],

      
            [
                
                'class' => 'yii\grid\ActionColumn',

                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                  'view' => function ($url) {
                      return Html::a('<span class="glyphicon glyphicon-eye-open">view</span>', $url, [
                                  'title' => Yii::t('app', 'lead-view'),
                      ]);
                  },
      
                  'update' => function () {
                      
                  },
                  'delete' => function () {
                     
                  }
      
                ],
             
            
            ],
        ],
       
    ]); 
    
    // echo Yii::$app->user->identity->id;

    ?>

   


</div>
</div>
</div>
