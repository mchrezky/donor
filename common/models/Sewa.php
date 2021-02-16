<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sewa".
 *
 * @property string $no_sewa
 * @property string $no_alat
 * @property string $id_customer
 * @property string $lama_sewa
 * @property string $tgl_sewa
 * @property string $tgl_selesai
 * @property int $telpon
 * @property string $nama_pic
 * @property string $approve
 * @property string $accept
 *
 * @property InspectionResult[] $inspectionResults
 * @property Customer $customer
 * @property Alat $noAlat
 */
class Sewa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sewa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_sewa', 'no_alat', 'id_customer', 'lama_sewa', 'tgl_sewa', 'tgl_selesai', 'telpon', 'nama_pic'], 'required'],
            [['tgl_sewa', 'tgl_selesai'], 'safe'],
            [['telpon'], 'integer'],
            [['no_sewa', 'no_alat', 'id_customer', 'lama_sewa', 'nama_pic'], 'string', 'max' => 25],
            [['approve', 'accept'], 'string', 'max' => 20],
            [['no_sewa'], 'unique'],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'id_customer']],
            [['no_alat'], 'exist', 'skipOnError' => true, 'targetClass' => Alat::className(), 'targetAttribute' => ['no_alat' => 'no_alat']],
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
        ];
    }

    /**
     * Gets query for [[InspectionResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionResults()
    {
        return $this->hasMany(InspectionResult::className(), ['id_sewa' => 'no_sewa']);
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_customer']);
    }

    /**
     * Gets query for [[NoAlat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoAlat()
    {
        return $this->hasOne(Alat::className(), ['no_alat' => 'no_alat']);
    }
}
