<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "concomitant_diagnosis".
 *
 * @property integer       $concomitant_id
 * @property integer       $diagnosis_base_id
 *
 * @property BaseDiagnosis $diagnosisBase
 * @property History[]     $histories
 */
class ConcomitantDiagnosis extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'concomitant_diagnosis';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['concomitant_id', 'diagnosis_base_id'], 'required'],
				[['concomitant_id', 'diagnosis_base_id'], 'integer'],
				[
						['diagnosis_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseDiagnosis::className(),
						'targetAttribute'=>['diagnosis_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'concomitant_id'   =>'Concomitant ID',
				'diagnosis_base_id'=>'Diagnosis Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDiagnosisBase()
	{
		return $this->hasOne(BaseDiagnosis::className(), ['id'=>'diagnosis_base_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHistories()
	{
		return $this->hasMany(History::className(), ['diagnosis_concomitant'=>'concomitant_id']);
	}
}
