<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Inspectionresult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspectionresult-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_inspection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_sewa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_question')->textInput() ?>

    <?= $form->field($model, 'tgl_inspection')->textInput() ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cek_inspection')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
