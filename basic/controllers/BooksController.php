<?php

namespace app\controllers;

use app\models\Books;
use app\models\BooksSearch;
use app\models\Libraries;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * BooksController implements the CRUD actions for Books model.
 */
class BooksController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Books models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
    //   echo '<pre>';
        // print_r($dataProvider);
        
        // exit();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Books();




        if ($this->request->isPost) {


            
        if(isset(Yii::$app->user->identity->id)){
            $author_name=Yii::$app->user->identity->id;
            $log='created';
            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
        //    $role = Yii::$app->user->identity->role;
            Yii::$app->db->createCommand()
            ->insert('log', [
            'user_id' => $author_name,
            // 'user_action'=>'no_action',
            // 'book_action' =>  $log,
            // 'library_action' => 'no_action',
            'type' => 'Book',
            'action' => $log,
            'updated_date'=>  $pdate,
            ])->execute();

           }



// ..............................................................
date_default_timezone_set("Asia/Calcutta");   
$pdate= date('y:m:d h:m:s');
           
            // $model->Library_name = $this->Library_name;
            $model->created_date =$pdate;
            $model->updated_date = $pdate;

 // .........................getting library id /...................
     
           

 

// ................................................................

            if($model->load($this->request->post())){

                $usid = (new \yii\db\Query())
                ->select(['id'])
                ->from('user')
                ->where(['username' =>  $model->author_id])
                // ->limit(10)
                ->all();
                $model->author_id = $usid[0]['id'];

            // echo  $model->library_id;

            $libid = (new \yii\db\Query())
            ->select(['id'])
            ->from('libraries')
            ->where(['Library_name' =>  $model->library_id])
            // ->limit(10)
            ->all();

            // echo $libid[0]['id'];
            // exit();

            $model->library_id = $libid[0]['id'];

            // ..............................validation.....................

            
            $username = (new \yii\db\Query())
            ->select(['book_title'])
            ->from('books')
            ->where(['book_title' => $model->book_title])
            // ->limit(10)
            ->all();

    // print_r();

    if(isset($username[0]['book_title'])){
        Yii::$app->session->setFlash('error', "This Book is already present in library please select diffrent name.");
    }else{
        
        if ($model->save()) {
 

            // if(isset(\Yii::$app->user->identity->email)){
            //     $user_email=\Yii::$app->user->identity->email;
            //      Yii::$app->mailer->compose()
            //    ->setFrom('sminagendra@gmail.com')
            //    ->setTo($user_email)
            //    ->setSubject('Hello You have created a book')
            //    ->send();
            //      }


            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    //.......................................................

          
        } else {
            $model->loadDefaultValues();
        }

    }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($this->request->isPost) {


            if(isset(Yii::$app->user->identity->id)){
                $author_name=Yii::$app->user->identity->id;
                $log='updated';
                date_default_timezone_set("Asia/Calcutta");   
                $pdate= date('y:m:d h:m:s');
            //    $role = Yii::$app->user->identity->role;
    
                Yii::$app->db->createCommand()
                ->insert('log', [
                'user_id' => $author_name,
                'type' => 'Book',
                'action' => $log,
                'updated_date'=>  $pdate,
                // 'role'=>  $role,
    
                ])->execute();
    
               }
            // ......................................

            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
           
            // $model->Library_name = $this->Library_name;
            // $model->created_date =$pdate;
            $model->updated_date = $pdate;

            // ...........................................

            if($model->load($this->request->post()) ){
                // .......................gettig id.........................

                $usid = (new \yii\db\Query())
                ->select(['id'])
                ->from('user')
                ->where(['username' =>  $model->author_id])
                // ->limit(10)
                ->all();
                $model->author_id = $usid[0]['id'];

                $libid = (new \yii\db\Query())
                ->select(['id'])
                ->from('libraries')
                ->where(['Library_name' =>  $model->library_id])
                // ->limit(10)
                ->all();
    
                // echo $libid[0]['id'];
                // exit();
    
                $model->library_id = $libid[0]['id'];
                // .......................................................

        if ($model->save()) {
            // 

            // .................mail sending part...............................

    //  if(isset(\Yii::$app->user->identity->email)){

    //                      $user_email=\Yii::$app->user->identity->email;
    //                       Yii::$app->mailer->compose()
    //                     ->setFrom('sminagendra@gmail.com')
    //                     ->setTo($user_email)
    //                     ->setSubject('Hello You have updated a book')
    //                     ->send();
    //                       }
    
    //..................................................................

            return $this->redirect(['view', 'id' => $model->id]);
        }
    }
    }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if(isset(Yii::$app->user->identity->id)){
            $author_name=Yii::$app->user->identity->id;
            $log='deleted';
            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
        //    $role = Yii::$app->user->identity->role;

            Yii::$app->db->createCommand()
            ->insert('log', [
            'user_id' => $author_name,
            // 'user_action'=>'no_action',
            // 'book_action' =>  $log,
            // 'library_action' => 'no_action',
            'type' => 'Book',
            'action' => $log,
            'updated_date'=>  $pdate,
            // 'role'=>  $role,

            ])->execute();

           }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Books::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // ......................................................


   
}
