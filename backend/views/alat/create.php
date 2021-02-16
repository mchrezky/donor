<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Alat */

$this->title = 'Create Alat';
$this->params['breadcrumbs'][] = ['label' => 'Alats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
