<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "diagnosis_preliminary".
 *
 * @property integer       $diagnosis_preliminary_id
 * @property integer       $diagnosis_base_id
 *
 * @property BaseDiagnosis $diagnosisBase
 * @property History[]     $histories
 */
class DiagnosisPreliminary extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'diagnosis_preliminary';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['diagnosis_preliminary_id', 'diagnosis_base_id'], 'required'],
				[['diagnosis_preliminary_id', 'diagnosis_base_id'], 'integer'],
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
				'diagnosis_preliminary_id'=>'Diagnosis Preliminary ID',
				'diagnosis_base_id'       =>'Diagnosis Base ID',
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
		return $this->hasMany(History::className(), ['diagnosis_preliminary'=>'diagnosis_preliminary_id']);
	}
}
