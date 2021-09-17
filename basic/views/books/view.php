<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Libraries;


/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = $model->book_title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="books-view">

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
            'book_title',
            'created_date',
            'updated_date',
            // 'library_id',
            // 'author_id',
            // 'author_date_of_birth',


            [
                'label' => 'Authors Name',
                'attribute' => 'library_namez',
                'value' => function($model){
                
            //    ........................................

            // if(isset(\Yii::$app->user->identity->id)){

            //    echo ;

               $authorname = (new \yii\db\Query())
                ->select(['username'])
                ->from('user')
                ->where(['id' => $model->author_id])
                ->one();
                // var_dump($authorname);

                // echo $model->author_id;

                return $authorname['username'];
               
            // }
     
            // ...........................................
    }
            ],





            [
                'label' => 'Library Name',
                'attribute' => 'library_namez',
                'value' => function($model){
                
            //    ........................................

            // if(isset(\Yii::$app->user->identity->id)){

            //    echo ;

               $libraryname = (new \yii\db\Query())
                ->select(['Library_name'])
                ->from('libraries')
                ->where(['id' => $model->library_id])
                ->one();
                // var_dump($libraryname);

                return $libraryname['Library_name'];
               
            // }
        
            


            // ...........................................
    }
            ],

        ],
    ]) ?>

</div>
