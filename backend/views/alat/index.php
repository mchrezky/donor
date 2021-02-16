<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Alat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_alat',
            'nama',
            'brand',
            'asset_no',
            'nopol',
            //'year',
            //'location:ntext',
            //'date_inspeksi',
            //'status_inspeksi',
            //'kapasitas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
