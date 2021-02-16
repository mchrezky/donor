<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inspectionresults';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspectionresult-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inspectionresult', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_inspection',
            'id_sewa',
            'id_question',
            'tgl_inspection',
            'result',
            //'cek_inspection',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
