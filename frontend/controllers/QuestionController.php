<?php
namespace frontend\controllers;
use Yii;
use common\models\Question;
use common\models\Sewa;
use common\models\VwSewa;
use common\models\QuestionInspection;
use common\models\Inspectionresult;
use yii\rest\ActiveController;
use yii\base\ErrorException;
use yii\base\Model;
use common\models\LoginForm;
use frontend\models\SignupForm;

class QuestionController extends ActiveController
{
    public $modelClass = 'common\models\Question';
    public function actions()
    {
      $actions = parent::actions();
      return $actions;
    }
      protected function verbs()
        {
        return [
           'question' => ['GET'],
           'result' => ['GET'],
           'test' => ['GET'],
           'view' => ['GET'],
           'answers' => ['POST'],
        ];
      }
      public function actionQuestion($id){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $sewa = Sewa::findOne($id);
        if($sewa){
        $question = QuestionInspection::find()->where(['no_alat'=>  $sewa->no_alat])->all();
          if(count($question) > 0 ){
            return array('status' => true, 'data'=> $question);
          }else{
            return array('status'=>false,'data'=> 'No Alat Found');
          }
        }else{
          return array('status'=>false,'data'=> 'Params No Found');
        }
      }
      public function actionResult($id){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $sewa = Sewa::findOne($id);
        $sewas = VwSewa::find()->where(['no_sewa'=>  $id])->all();
        if($sewa){
        $question = QuestionInspection::find()->where(['no_alat'=>  $sewa->no_alat])->all();
        $good = QuestionInspection::find()->where(['no_alat'=>  $sewa->no_alat])->andWhere(['result'=>'GOOD'])->all();
        $notgood = QuestionInspection::find()->where(['no_alat'=>  $sewa->no_alat])->andWhere(['result'=>'NOT GOOD'])->all();
        $answered = QuestionInspection::find()->where(['no_alat'=>  $sewa->no_alat])->andWhere('result != :result',['result'=>''])->all();
        $null = QuestionInspection::find()->where(['no_alat'=>  $sewa->no_alat])->andWhere(['result'=>null])->all();
        $result='';
        if (count($notgood)==0) {
          $result='PASSED';
        }else{
          $result='NOT PASSED';
        }
          if(count($question) > 0 ){
            return array('status' => true,'tot_question'=>count($question),'tot_answer'=>count($answered),'tot_null'=>count($null),'tot_good'=>count($good),'tot_notgood'=>count($notgood),'result'=>$result, 'data'=> $sewas);
          }else{
            return array('status'=>false,'data'=> 'No Alat Found');
          }
        }else{
          return array('status'=>false,'data'=> 'Params No Found');
        }
      }
      public function actionAnswers(){
         $model = new Inspectionresult();
         $params = Yii::$app->request->post();
         $model->id_inspection = $params['id_sewa'].$params['id_question'];
         $model->id_sewa = $params['id_sewa'];
         $model->id_question = $params['id_question'];
         $model->result = $params['result'];
         $model->cek_inspection = $params['cek_inspection'];
         if ($model->save()) {
             $response['message'] = 'Success Save!';
             $response['status'] = 1;
            //  $response['user'] = User::findByUsername($model->username);
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
      public function actionTest($id){
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $idnya=0;
        if($id=1){
          $idnya = 'C-001';
        // }else if($id=2){
        //   $idnya = '1302';
        // }else if($id=3){
        //   $idnya = '1303';
        // }else if($id=4){
        //   $idnya = '1304';
        // }else if($id=5){
        //   $idnya = '1305';
        }else{
          $idnya = '1306';
        }
        $question = Question::find()->where(['no_alat'=> $idnya])->all();
        if(count($question) > 0 ){
          // $datas = array('page'=> $id,
          // 'pages'=> 6,
          // 'per_page'=> '50','total'=>count($question));
          // return array($datas,$question);
          return array('status' => true, 'data'=> $question);
        }else{
          return array('status'=>false,'data'=> 'No EventList Found');
        }
      }
}
