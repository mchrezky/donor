<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id_question
 * @property string $no_alat
 * @property string $question
 * @property int $cat
 *
 * @property InspectionResult[] $inspectionResults
 * @property Alat $noAlat
 * @property Categori $cat0
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_alat', 'question', 'cat'], 'required'],
            [['question'], 'string'],
            [['cat'], 'integer'],
            [['no_alat'], 'string', 'max' => 25],
            [['no_alat'], 'exist', 'skipOnError' => true, 'targetClass' => Alat::className(), 'targetAttribute' => ['no_alat' => 'no_alat']],
            [['cat'], 'exist', 'skipOnError' => true, 'targetClass' => Categori::className(), 'targetAttribute' => ['cat' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_question' => 'Id Question',
            'no_alat' => 'No Alat',
            'question' => 'Question',
            'cat' => 'Cat',
        ];
    }

    /**
     * Gets query for [[InspectionResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionResults()
    {
        return $this->hasMany(InspectionResult::className(), ['id_question' => 'id_question']);
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

    /**
     * Gets query for [[Cat0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat0()
    {
        return $this->hasOne(Categori::className(), ['id' => 'cat']);
    }
}
