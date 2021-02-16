<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sewa */

$this->title = 'Update Sewa: ' . $model->no_sewa;
$this->params['breadcrumbs'][] = ['label' => 'Sewas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_sewa, 'url' => ['view', 'id' => $model->no_sewa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sewa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
