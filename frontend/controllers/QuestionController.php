<?php
namespace frontend\controllers;
use Yii;
use common\models\Donor;
use yii\rest\ActiveController;
use yii\base\ErrorException;
use yii\base\Model;
use common\models\LoginForm;
use frontend\models\SignupForm;

class DonorController extends ActiveController
{
    public $modelClass = 'common\models\Donor';
    public function actions()
    {
      $actions = parent::actions();
      return $actions;
    }
      protected function verbs()
        {
        return [
           'get' => ['GET'],
           'result' => ['GET'],
           'test' => ['GET'],
           'view' => ['GET'],
           'answers' => ['POST'],
        ];
      }
      public function actionGet($id){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
     
        $Donor = Donor::find()->all();
          if(count($Donor) > 0 ){
            return array('status' => true, 'data'=> $Donor);
          }else{
            return array('status'=>false,'data'=> 'No Donor Found');
          }
       
      }
      public function actionPost(){
         $model = new Donor();
         $params = Yii::$app->request->post();
         $model->id_user = $params['id_user'];
         $model->nama = $params['nama'];
         $model->usia = $params['usia'];
         $model->result = $params['result'];
         $model->jk = $params['jk'];
         $model->tinggi_badan = $params['tinggi_badan'];
         $model->berat_badan = $params['berat_badan'];
         $model->tanggal = $params['tanggal'];
         $model->status = "Active";
         if ($model->save()) {
             $response['message'] = 'Success Save!';
             $response['status'] = 1;
            //  $response['user'] = User::findByUsername($model->username);
             //return [$response,$model];
             return $response;
         } else {
               $model->validate();
               
               $response['message'] = 'Error! Can\'t Save.';
               $response['status'] = 0;
               $response['errors'] = $model->getErrors();
                 return $response;
         }
       }
      public function actionView($id){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $donor = Donor::find()->where(['id_donor'=> $id])->all();
        if(count($donor) > 0 ){
          return array('status' => true, 'data'=> $donor);
        }else{
          return array('status'=>false,'data'=> 'No EventList Found');
        }
      }
     
}
