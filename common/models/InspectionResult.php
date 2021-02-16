<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inspection_result".
 *
 * @property string $id_inspection
 * @property string $id_sewa
 * @property int $id_question
 * @property string $tgl_inspection
 * @property string $result
 * @property string $cek_inspection
 *
 * @property Question $question
 * @property Sewa $sewa
 */
class InspectionResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inspection_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_inspection', 'id_sewa', 'id_question', 'result', 'cek_inspection'], 'required'],
            [['id_question'], 'integer'],
            [['tgl_inspection'], 'safe'],
            [['id_inspection', 'id_sewa', 'result', 'cek_inspection'], 'string', 'max' => 25],
            [['id_inspection'], 'unique'],
            [['id_question'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['id_question' => 'id_question']],
            [['id_sewa'], 'exist', 'skipOnError' => true, 'targetClass' => Sewa::className(), 'targetAttribute' => ['id_sewa' => 'no_sewa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_inspection' => 'Id Inspection',
            'id_sewa' => 'Id Sewa',
            'id_question' => 'Id Question',
            'tgl_inspection' => 'Tgl Inspection',
            'result' => 'Result',
            'cek_inspection' => 'Cek Inspection',
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id_question' => 'id_question']);
    }

    /**
     * Gets query for [[Sewa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSewa()
    {
        return $this->hasOne(Sewa::className(), ['no_sewa' => 'id_sewa']);
    }
}
