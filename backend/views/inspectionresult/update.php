<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Inspectionresult */

$this->title = 'Update Inspectionresult: ' . $model->id_inspection;
$this->params['breadcrumbs'][] = ['label' => 'Inspectionresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inspection, 'url' => ['view', 'id' => $model->id_inspection]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspectionresult-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
