<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sewas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sewa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sewa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <div class="content" >
        <table class="table">
            <tr>
                <td>No Sewa</td>
                <td>Alat</td>
                <td>Customer</td>
                <td>Tgl Sewa</td>
                <td>PIC</td>
                <td>Result</td>
                <td>Tgl Inspection</td>
                <td>Action</td>
            </tr>
            <?php foreach ($models as $key ) { ?>
            <tr>
                <td><?= $key->no_sewa ?></td>
                <td><?= $key->alat ?></td>
                <td><?= $key->customer ?></td>
                <td><?= $key->tgl_sewa ." - " .$key->tgl_selesai ?></td>
                <td><?= $key->pic ?></td>
                <td><?php if($key->no_good>0){
                        echo "NOT PASSED";
                    }else{
                        if($key->tot_result==0){
                            echo "INPECTION";
                        }else{
                            echo "PASSED";
                        }
                    }  ?>
                </td>
                <td><?= $key->tgl_inspection ?></td>
                <td>  <?= Html::a('Approval', ['sewa/view/','id'=>$key->no_sewa], ['class' => 'btn btn-info']) ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>


</div>
