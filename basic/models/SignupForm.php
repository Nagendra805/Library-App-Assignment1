<?php
/**
 * User: TheCodeholic
 * Date: 8/11/2019
 * Time: 12:52 PM
 */

//ContactForm.php

namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;
use yii;

/**
 * Class SignupForm
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app\models
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $date_of_birth;

    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat','date_of_birth'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 5, 'max' => 32],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
            ['email','required']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->auth_key = \Yii::$app->security->generateRandomString();
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user -> email = $this->email;
        $user ->date_of_birth =$this->date_of_birth;
        date_default_timezone_set("Asia/Calcutta");   
        $pdate= date('y:m:d h:m:s');

        $role_assign = (new \yii\db\Query())
        ->select(['username'])
        ->from('user')
        // ->where(['email' => $user->email])
        // ->limit(10)
        ->all();
  if(isset($role_assign)){
    $user->role = 'author';
  }else{
    $user->role = 'admin';
  }
       
        // $model->Library_name = $this->Library_name;
        $user->created_date =$pdate;
        $user->updated_date = $pdate;

          $username = (new \yii\db\Query())
            ->select(['username'])
            ->from('user')
            ->where(['email' => $user->email])
            // ->limit(10)
            ->all();

            // print_r();

          if(isset($username[0]['username'])){

        Yii::$app->session->setFlash('error', "This User already registerd select diffrent name.");

            }else{
            if ($user->save()){
            return true;
            }

            }

    // exit();


        \Yii::error("User was not saved: ".VarDumper::dumpAsString($user->errors));
        return false;
    }

}
