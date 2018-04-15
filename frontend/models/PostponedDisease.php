<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "postponed_disease".
 *
 * @property integer       $postponed_disease_id
 * @property integer       $diagnosis_base_id
 *
 * @property BaseDiagnosis $diagnosisBase
 */
class PostponedDisease extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'postponed_disease';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['postponed_disease_id', 'diagnosis_base_id'], 'required'],
				[['postponed_disease_id', 'diagnosis_base_id'], 'integer'],
				[['postponed_disease_id'], 'unique'],
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
				'postponed_disease_id'=>'Postponed Disease ID',
				'diagnosis_base_id'   =>'Diagnosis Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDiagnosisBase()
	{
		return $this->hasOne(BaseDiagnosis::className(), ['id'=>'diagnosis_base_id']);
	}
}
