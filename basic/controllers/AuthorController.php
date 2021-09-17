<?php

namespace app\controllers;

use app\models\Author;
use app\models\AuthorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * AuthorController implements the CRUD actions for Author model.
 */
class AuthorController extends Controller
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
     * Lists all Author models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Author model.
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
     * Creates a new Author model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Author();
        //    ...............................................

        date_default_timezone_set("Asia/Calcutta");   
        $pdate= date('y:m:d h:m:s');
       
        // $model->Library_name = $this->Library_name;
        $model->created_date =$pdate;
        $model->updated_date = $pdate;
        // ............................................


        if ($model->load(Yii::$app->request->post())) {

            if(isset(Yii::$app->user->identity->id)){
            
                $author_id=Yii::$app->user->identity->id;
                $log='added';
                date_default_timezone_set("Asia/Calcutta");   
                $pdate= date('y:m:d h:m:s');

                Yii::$app->db->createCommand()
                ->insert('log', [
                'user_id' => $author_id,
                // 'user_action' =>  $log,
                // 'book_action' => 'no_action',
                // 'library_action' => 'no_action',
                'type' => 'Author',
                'action' => $log,
                'updated_date'=>  $pdate,
    
                ])->execute();
    
               }

            $model->password = \Yii::$app->security->generatePasswordHash($model->password);
            // echo $model->password;
            // exit();


            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Author model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       

           date_default_timezone_set("Asia/Calcutta");   
           $pdate= date('y:m:d h:m:s');
          
           // $model->Library_name = $this->Library_name;
           // $model->created_date =$pdate;
           $model->updated_date = $pdate;

        if($model->load(Yii::$app->request->post())){
            $model->password = \Yii::$app->security->generatePasswordHash($model->password);
            $model->auth_key=\Yii::$app->security->generateRandomString();
            $model->access_token=\Yii::$app->security->generateRandomString();

            if(isset(Yii::$app->user->identity->id)){

                $author_id=Yii::$app->user->identity->id;
                $log='updated';
                date_default_timezone_set("Asia/Calcutta");   
                $pdate= date('y:m:d h:m:s');
            //    $role = Yii::$app->user->identity->role;
    
    
                Yii::$app->db->createCommand()
                ->insert('log', [
                'user_id' => $author_id,
                // 'user_action' =>  $log,
                //  'book_action' => 'no_action',
                //  'library_action' => 'no_action',
                 'type' => 'Author',
                 'action' => $log,
                // 'role'=>  $role,
    
                ])->execute();
    
               }
//..................................................................
        if ( $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

    }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Author model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Author model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Author the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Author::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
