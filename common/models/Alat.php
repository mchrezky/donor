<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alat".
 *
 * @property string $no_alat
 * @property string $nama
 * @property string $brand
 * @property string $asset_no
 * @property string $nopol
 * @property string $year
 * @property string $location
 * @property string $date_inspeksi
 * @property string $status_inspeksi
 * @property int $kapasitas
 *
 * @property Question[] $questions
 * @property Sewa[] $sewas
 */
class Alat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_alat', 'nama', 'brand', 'asset_no', 'nopol', 'year', 'location', 'date_inspeksi', 'status_inspeksi', 'kapasitas'], 'required'],
            [['location'], 'string'],
            [['date_inspeksi'], 'safe'],
            [['kapasitas'], 'integer'],
            [['no_alat', 'nama', 'brand', 'asset_no', 'nopol', 'year', 'status_inspeksi'], 'string', 'max' => 25],
            [['no_alat'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_alat' => 'No Alat',
            'nama' => 'Nama',
            'brand' => 'Brand',
            'asset_no' => 'Asset No',
            'nopol' => 'Nopol',
            'year' => 'Year',
            'location' => 'Location',
            'date_inspeksi' => 'Date Inspeksi',
            'status_inspeksi' => 'Status Inspeksi',
            'kapasitas' => 'Kapasitas',
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['no_alat' => 'no_alat']);
    }

    /**
     * Gets query for [[Sewas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSewas()
    {
        return $this->hasMany(Sewa::className(), ['no_alat' => 'no_alat']);
    }
}
