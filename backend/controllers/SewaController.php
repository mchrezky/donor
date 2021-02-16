<?php

namespace backend\controllers;

use Yii;
use common\models\Sewa;
use common\models\VwSewaPic;
use common\models\QuestionInspection;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SewaController implements the CRUD actions for Sewa model.
 */
class SewaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sewa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $models =  VwSewaPic::find()->all();

        return $this->render('index', [
            'models' => $models,
        ]);
    }
    public function actionIndexPic()
    {
        $models =  VwSewaPic::find()->where(['nama_pic'=> Yii::$app->user->identity->username])->all();

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    /**
     * Displays a single Sewa model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = VwSewaPic::find()->where(['no_sewa'=> $id])->one();
        $result = QuestionInspection::find()->where(['no_alat'=>  $model->no_alat])->all();
        return $this->render('view', [
            'model' => $model,
            'result' => $result,
        ]);
    }

    /**
     * Creates a new Sewa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sewa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->no_sewa]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sewa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->no_sewa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $model->approve='Approved';
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->no_sewa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionNotapprove($id)
    {
        $model = $this->findModel($id);
        $model->approve='Not Approved';
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->no_sewa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionAccept($id)
    {
        $model = $this->findModel($id);
        $model->approve='Accepted';
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->no_sewa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionNotaccept($id)
    {
        $model = $this->findModel($id);
        $model->approve='Not Accepted';
        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->no_sewa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Sewa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sewa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sewa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sewa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
