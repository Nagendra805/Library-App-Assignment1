<?php

use app\models\Books;
use yii\helpers\Html;
// use fedemotta\datatables\DataTables;
use reine\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibrariesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Libraries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libraries-index">

<h1 class='text-info text-center'><?= Html::encode($this->title) ?></h1>

<?php if (!Yii::$app->user->isGuest): ?>

    <p>
        <?= Html::a('Create Libraries', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php endif; ?>
    <!-- ........................................... -->

    <div class="row">
        <div class="col-12">

    <?= DataTables::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table card-table table-dark table-striped table-vcenter text-nowrap datatable',
         
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'Library_name',
                'opening_time',
                'closing_time',
                'created_date',
                'updated_date',
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
        ]);?>

</div>
    </div>


    <!-- .............................................. -->
<?php
 if(isset(\Yii::$app->user->identity->user_id)){
     
      $user_name=\Yii::$app->user->identity->user_id;
 }

  ?>

<?php

if(isset($user_name)){
    $nofbooks = Books::find()->where(['user_id'=>$user_name])->all();

 $blenth=count($nofbooks);
                
 for($i=0;$i<$blenth;$i++){
     $datas[$i]=$nofbooks[$i]['book_title'];

 }

 if(isset($datas)){
     echo "<span class='text-primary'>Hello u Have published </span>"."<span class='text-info'>".implode(" , ",$datas)."</span>"." <span class='text-primary'>Books.<br> Thank you </span class='text-primary'>";
 }
//  ...........................user-logs................

echo '<br>';

}

?>

<?php

if(isset(\Yii::$app->user->identity->id)){
    $user_role=\Yii::$app->user->identity->role;
    $user_id=\Yii::$app->user->identity->id;

    if($user_role === 'admin'){
       
        $all_logs = (new \yii\db\Query())
        ->select(['user_id','type','action','updated_date'])
        ->from('log')
        ->all();
        $log_lennth=count($all_logs);

        // $rall_name_logs[$i]=$all_logs;
        // echo $log_lennth;

        // print_r($all_logs);



        for($i=0;$i<$log_lennth;$i++){

            $all_name_logs = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $all_logs[$i]['user_id']])
            ->limit(1)
            ->all();

            $rall_name_logs[$i]=$all_name_logs;
        }
        // print_r( $rall_name_logs);
    }else{
        $all_logs = (new \yii\db\Query())
        ->select(['user_id','type','action','updated_date'])
        ->from('log')
        ->where(['user_id' => $user_id])
        ->all();
        $log_lennth=count($all_logs);


        for($i=0;$i<$log_lennth;$i++){

            // print_r($all_logs);
            // exit();

            $all_name_logs = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['id' => $all_logs[$i]['user_id']])
            ->limit(1)
            ->all();

            $rall_name_logs[$i]=$all_name_logs;
        }

        // $rall_name_logs[$i]=$all_logs;

    }


    //   print_r( $all_logs[0]);

    for($j=0;$j<$log_lennth;$j++){
  
        if(isset($all_logs[$j])){
            // print_r($rall_name_logs[$j]);
            if($all_logs[$j]['type'] == 'User'){
                echo "<p class='text-center text-dark bg-info h5'>";
                echo $rall_name_logs[$j][0]['username'].' '. $all_logs[$j]['action'] . ' on '. $all_logs[$j]['updated_date'].'';
                echo '</p>';
            }else if($all_logs[$j]['type'] == 'Author'){
                echo "<p class='text-center text-dark bg-info h5'>";
                echo $rall_name_logs[$j][0]['username'].' '. $all_logs[$j]['action'] . ' author  on '. $all_logs[$j]['updated_date'].'';
                echo '</p>';
            }else if($all_logs[$j]['type'] == 'Library'){
                echo "<p class='text-center text-dark bg-info h5 '>";
                echo $rall_name_logs[$j][0]['username'].' '. $all_logs[$j]['action'] . ' library  on '. $all_logs[$j]['updated_date'];
                echo '</p>';
            }else if($all_logs[$j]['type'] == 'Book'){
                echo "<p class='text-center text-dark bg-info h5 '>";
                echo $rall_name_logs[$j][0]['username'].' '. $all_logs[$j]['action'] . '   on '. $all_logs[$j]['updated_date'];

                echo '</p>';
            } 
        } 
    }
    
}
?>

</div>
