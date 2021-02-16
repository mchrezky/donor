<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Alat */

$this->title = 'Update Alat: ' . $model->no_alat;
$this->params['breadcrumbs'][] = ['label' => 'Alats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_alat, 'url' => ['view', 'id' => $model->no_alat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
