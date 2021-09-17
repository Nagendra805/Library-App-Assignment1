<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\AddauthorForm;
// use app\models\

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $author_id=Yii::$app->user->identity->id;
            $log='loged-in';
            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
           $role = Yii::$app->user->identity->role;


            Yii::$app->db->createCommand()
            ->insert('log', [
                'user_id' => $author_id,
                'user_id' => $author_id,
                'type' => 'User',
                'action' => $log,
                'updated_date' => $pdate,
                

            ])->execute();



            return $this->goBack();


        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /*

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {

        if(isset(Yii::$app->user->identity->id)){
            $author_id=Yii::$app->user->identity->id;
            $log='loged-out';
            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
           $role = Yii::$app->user->identity->role;


            Yii::$app->db->createCommand()
            ->insert('log', [
                'user_id' => $author_id,
                'user_id' => $author_id,
                'type' => 'User',
                'action' => $log,
                'updated_date'=>  $pdate,
            ])->execute();
    }
        Yii::$app->user->logout();
        return $this->goHome();
    }
    /**
     * Displays signup page.
     *
     * @return Response|string
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        if(isset(Yii::$app->user->identity->username)){
            $author_id=Yii::$app->user->identity->username;
        $log='created';
        date_default_timezone_set("Asia/Calcutta");   
        $pdate= date('y:m:d h:m:s');
        Yii::$app->db->createCommand()
        ->insert('user_llogog', [
            'user_id' => $author_id,
            'user_action' => $log,
            'book_action' => 'no_action',
            'library_action' =>  'no_action',
            'updated_date'=>  $pdate,

        // 'role'=>  $role,

        ])->execute();
    }


  if($model->load(Yii::$app->request->post())){
        if ($model->signup()){
            Yii::$app->session->addFlash('SIGNUP', 'You have successfully registered');
            return $this->redirect(Yii::$app->homeUrl);
        }
    }

        return $this->render('signup', [
            'model' => $model
        ]);
    }

    public function actionAddauthor()
    {
        $model = new AddauthorForm();
        if(isset(Yii::$app->user->identity->username)){
            $author_id=Yii::$app->user->identity->username;
            $log='added';
            date_default_timezone_set("Asia/Calcutta");   
            $pdate= date('y:m:d h:m:s');
        //    $role = Yii::$app->user->identity->role;
            Yii::$app->db->createCommand()
            ->insert('log', [
            'user_id' => $author_id,
            'user_action' =>  $log,
            'type' => 'User',
            'action' => $log,
            'updated_date'=>  $pdate,

            // 'role'=>  $role,
            ])->execute();
           }
        if ($model->load(Yii::$app->request->post()) && $model->addauthor()){
           Yii::$app->session->addFlash('Add Authors', 'You have successfully registered');
            return $this->redirect(Yii::$app->homeUrl);
        }

        return $this->render('addauthor', [
            'model' => $model
        ]);


    }



    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

}
