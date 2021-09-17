<?php

namespace app\controllers;

use app\models\Libraries;
use app\models\Books;
use app\models\LibrariesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * LibrariesController implements the CRUD actions for Libraries model.
 */
class LibrariesController extends Controller
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
     * Lists all Libraries models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LibrariesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Libraries model.
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
     * Creates a new Libraries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Libraries();

        if ($this->request->isPost) {

// ..........................................

date_default_timezone_set("Asia/Calcutta");   
$pdate= date('y:m:d h:m:s');
           
            // $model->Library_name = $this->Library_name;
            $model->created_date =$pdate;
            $model->updated_date = $pdate;

            // ....................................

            if(isset(Yii::$app->user->identity->id)){
                $author_id=Yii::$app->user->identity->id;
                $log='created';
                date_default_timezone_set("Asia/Calcutta");   
                $pdate= date('y:m:d h:m:s');
            //    $role = Yii::$app->user->identity->role;
    
                Yii::$app->db->createCommand()
                ->insert('log', [
                'user_id' => $author_id,
                // 'user_action' => 'no_action',
                // 'book_action' => 'no_action',
                // 'library_action' =>  $log,
                'type' => 'Library',
                'action' => $log,
                'updated_date'=>  $pdate,
                // 'role'=>  $role,
    
                ])->execute();
    
               }

//.........................................................


if($model->load($this->request->post())){

    $libname = (new \yii\db\Query())
    ->select(['Library_name'])
    ->from('libraries')
    ->where(['Library_name' => $model->Library_name])
    // ->limit(10)
    ->all();

    // print_r();

    if(isset($libname[0]['Library_name'])){
        Yii::$app->session->setFlash('error', "This Library is already present please select diffrent name..");
    }else{

          if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
    }
          
        } else {
            $model->loadDefaultValues();
        }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Libraries model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        date_default_timezone_set("Asia/Calcutta");   
    //    $ptime= date('H:i');
           
       $pdate= date('y:m:d h:m:s');
           
       // $model->Library_name = $this->Library_name;
       
       $model->updated_date = $pdate;
       if($this->request->isPost ){

        if(isset(Yii::$app->user->identity->id)){
            $author_id=Yii::$app->user->identity->id;
            $log='updated';
            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
        //    $role = Yii::$app->user->identity->role;
            Yii::$app->db->createCommand()
            ->insert('log', [
            'user_id' => $author_id,
            'user_id' => $author_id,
            'user_action' => 'no_action',
            'book_action' => 'no_action',
            // 'library_action' =>  $log,
            // 'library_action' =>  $log,
            // 'updated_date'=>  $pdate,
            'type' => 'Library',
            'action' => $log,
            // 'role'=>  $role,

            ])->execute();

           }

           if($model->load($this->request->post())){

    


        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }
    }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Libraries model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if(isset(Yii::$app->user->identity->id)){
            $author_id=Yii::$app->user->identity->id;
            $log='deleted';
            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
        //    $role = Yii::$app->user->identity->role;

            Yii::$app->db->createCommand()
            ->insert('log', [
            'user_id' => $author_id,
            'library_action' =>  $log,
            'updated_date'=>  $pdate,
            'type' => 'Library',
            'action' => $log,
            ])->execute();

           }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Libraries model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Libraries the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Libraries::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


  
}
