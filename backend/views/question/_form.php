<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Alat;
use common\models\Categori;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'no_alat')->dropDownList(ArrayHelper::map(Alat::find()->all(),'no_alat','nama'),['prompt' => 'Select']) ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cat')->dropDownList(ArrayHelper::map(Categori::find()->all(),'id','nama'),['prompt' => 'Select']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
