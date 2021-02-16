<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Inspectionresult */

$this->title = 'Create Inspectionresult';
$this->params['breadcrumbs'][] = ['label' => 'Inspectionresults', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspectionresult-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
