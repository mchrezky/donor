<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question_inspection".
 *
 * @property int $id
 * @property string $no_alat
 * @property string $question
 * @property int $cat
 * @property string|null $categori
 * @property string|null $id_inspection
 * @property string|null $id_sewa
 * @property int|null $id_question
 * @property string|null $tgl_inspection
 * @property string|null $result
 * @property string|null $cek_inspection
 */
class QuestionInspection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_inspection';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cat', 'id_question'], 'integer'],
            [['no_alat', 'question', 'cat'], 'required'],
            [['question'], 'string'],
            [['tgl_inspection'], 'safe'],
            [['no_alat', 'id_inspection', 'id_sewa', 'result', 'cek_inspection'], 'string', 'max' => 25],
            [['categori'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_alat' => 'No Alat',
            'question' => 'Question',
            'cat' => 'Cat',
            'categori' => 'Categori',
            'id_inspection' => 'Id Inspection',
            'id_sewa' => 'Id Sewa',
            'id_question' => 'Id Question',
            'tgl_inspection' => 'Tgl Inspection',
            'result' => 'Result',
            'cek_inspection' => 'Cek Inspection',
        ];
    }
}
