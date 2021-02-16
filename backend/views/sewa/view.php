<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sewa */

$this->title = $model->no_sewa;
$this->params['breadcrumbs'][] = ['label' => 'Sewas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sewa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
        if(Yii::$app->user->identity->level=='Admin'){ 
            echo Html::a('Update', ['update', 'id' => $model->no_sewa], ['class' => 'btn btn-primary'])." "; 
            echo Html::a('Approve', ['approve', 'id' => $model->no_sewa], ['class' => 'btn btn-success'])." "; 
            echo Html::a('Not Approve', ['notapprove', 'id' => $model->no_sewa], ['class' => 'btn btn-danger'])." "; 
            echo Html::a('Accept', ['accept', 'id' => $model->no_sewa], ['class' => 'btn btn-success'])." "; 
            echo Html::a('Not Accept', ['notaccept', 'id' => $model->no_sewa], ['class' => 'btn btn-danger']); 
        }else  if(Yii::$app->user->identity->level=='QCHSE HEAD'){
            echo Html::a('Approve', ['approve', 'id' => $model->no_sewa], ['class' => 'btn btn-success'])." "; 
            echo Html::a('Not Approve', ['notapprove', 'id' => $model->no_sewa], ['class' => 'btn btn-danger']); 

        }else  if(Yii::$app->user->identity->level=='MAINTENANCE HEAD'){ 
            echo Html::a('Accept', ['accept', 'id' => $model->no_sewa], ['class' => 'btn btn-success'])." "; 
            echo Html::a('Not Accept', ['notaccept', 'id' => $model->no_sewa], ['class' => 'btn btn-danger']); 
        
        }?>
        
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->no_sewa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_sewa',
            'no_alat',
            'alat',
            'customer',
            'lama_sewa',
            'tgl_sewa',
            'tgl_selesai',
            'telpon',
            'nama_pic',
            'approve',
            'accept',
        ],
    ]) ?>
    <h1>Rekap Inspection</h1>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <td> <strong>Question</strong> </td>
            <td><strong>Result</strong></td>
            <td><strong>Remark</strong></td>
        </tr>
        </thead>

        <?php foreach ($result as $key) { ?>
            <tr>
                <td><?= $key->question ?></td>
                <td><?= $key->result ?></td>
                <td><?= $key->cek_inspection ?></td>
            </tr>
        <?php  } ?>
    </table>
</div>
