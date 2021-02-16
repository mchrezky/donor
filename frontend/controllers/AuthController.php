<?php
namespace frontend\controllers;
use Yii;
use common\models\User;
use yii\rest\ActiveController;
use yii\base\ErrorException;
use yii\base\Model;
use common\models\LoginForm;
use frontend\models\SignupForm;

class AuthController extends ActiveController
{
    public $modelClass = 'common\models\User';
    public function actions()
    {
      $actions = parent::actions();
      return $actions;
    }
      protected function verbs()
        {
        return [
           'login' => ['POST'],
           'view' => ['GET'],
        ];
      }
      public function actionLogin(){
       $model = new LoginForm();
        $params = Yii::$app->request->post();
        $model->username = $params['username'];
        $model->password = $params['password'];
        if ($model->login()) {
            $response['message'] = 'You are now logged in!';
            $response['status'] = 1;
            $response['user'] = User::findByUsername($model->username);
            //return [$response,$model];
            return $response;
        } else {
              $model->validate();
              
              $response['message'] = 'Incorrect username or password.';
              $response['status'] = 0;
              $response['errors'] = $model->getErrors();
                return $response;
        }
      }
      public function actionView($id){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $user = User::find()->where(['id'=> $id])->all();
        if(count($user) > 0 ){
          return array('status' => true, 'data'=> $user);
        }else{
          return array('status'=>false,'data'=> 'No EventList Found');
        }
      }
      
}
