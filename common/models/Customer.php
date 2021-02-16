<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property string $id_customer
 * @property string $nama
 * @property string $alamat
 *
 * @property Sewa[] $sewas
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'nama', 'alamat'], 'required'],
            [['alamat'], 'string'],
            [['id_customer'], 'string', 'max' => 25],
            [['nama'], 'string', 'max' => 30],
            [['id_customer'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * Gets query for [[Sewas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSewas()
    {
        return $this->hasMany(Sewa::className(), ['id_customer' => 'id_customer']);
    }
}
