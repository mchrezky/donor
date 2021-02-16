<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vw_sewa_pic".
 *
 * @property string $no_sewa
 * @property string $no_alat
 * @property string $id_customer
 * @property string $lama_sewa
 * @property string $tgl_sewa
 * @property string $tgl_selesai
 * @property string $telpon
 * @property string $nama_pic
 * @property string|null $approve
 * @property string|null $accept
 * @property string $pic
 * @property string $customer
 * @property string $alat
 * @property string|null $id_inspection
 * @property string|null $id_sewa
 * @property int|null $id_question
 * @property string|null $tgl_inspection
 * @property string|null $result
 * @property string|null $cek_inspection
 * @property int $tot_result
 * @property int $good
 * @property int $no_good
 */
class VwSewaPic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vw_sewa_pic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_sewa', 'no_alat', 'id_customer', 'lama_sewa', 'tgl_sewa', 'tgl_selesai', 'telpon', 'nama_pic', 'pic', 'customer', 'alat'], 'required'],
            [['tgl_sewa', 'tgl_selesai', 'tgl_inspection'], 'safe'],
            [['id_question', 'tot_result', 'good', 'no_good'], 'integer'],
            [['no_sewa', 'no_alat', 'id_customer', 'lama_sewa', 'nama_pic', 'alat', 'id_inspection', 'id_sewa', 'result', 'cek_inspection'], 'string', 'max' => 25],
            [['telpon', 'approve', 'accept'], 'string', 'max' => 20],
            [['pic'], 'string', 'max' => 255],
            [['customer'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_sewa' => 'No Sewa',
            'no_alat' => 'No Alat',
            'id_customer' => 'Id Customer',
            'lama_sewa' => 'Lama Sewa',
            'tgl_sewa' => 'Tgl Sewa',
            'tgl_selesai' => 'Tgl Selesai',
            'telpon' => 'Telpon',
            'nama_pic' => 'Nama Pic',
            'approve' => 'Approve',
            'accept' => 'Accept',
            'pic' => 'Pic',
            'customer' => 'Customer',
            'alat' => 'Alat',
            'id_inspection' => 'Id Inspection',
            'id_sewa' => 'Id Sewa',
            'id_question' => 'Id Question',
            'tgl_inspection' => 'Tgl Inspection',
            'result' => 'Result',
            'cek_inspection' => 'Cek Inspection',
            'tot_result' => 'Tot Result',
            'good' => 'Good',
            'no_good' => 'No Good',
        ];
    }
}
