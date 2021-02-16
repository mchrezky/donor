<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Alat;
use common\models\Customer;
use common\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Sewa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sewa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_sewa')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'no_alat')->dropDownList(ArrayHelper::map(Alat::find()->all(),'no_alat','nama'),['prompt' => 'Select']) ?>

    <?= $form->field($model, 'id_customer')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'id_customer')->dropDownList(ArrayHelper::map(Customer::find()->all(),'id_customer','nama'),['prompt' => 'Select']) ?> -->

    <?= $form->field($model, 'lama_sewa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_sewa')->textInput() ?>

    <?= $form->field($model, 'tgl_selesai')->textInput() ?>

    <?= $form->field($model, 'telpon')->textInput() ?>

    <?= $form->field($model, 'nama_pic')->dropDownList(ArrayHelper::map(User::find()->where(['level'=> 'Inspector'])->all(),'id','username'),['prompt' => 'Select']) ?>
<!-- 
    <?= $form->field($model, 'approve')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accept')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
