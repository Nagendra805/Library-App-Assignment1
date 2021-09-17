<?php

use yii\helpers\Html;
use yii\grid\GridView;
use reine\datatables\DataTables;


/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Author', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= DataTables::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            // Optional (only if you want to override the defaults)
            'tableOptions' => [
                'class' => 'table table-dark table-striped card-table table-vcenter text-nowrap datatable',
            ],
         
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            // 'password',
            // 'auth_key',
            // 'access_token',
            'email:email',
            'role',
            'date_of_birth',

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

        
    ]); ?>


</div>
