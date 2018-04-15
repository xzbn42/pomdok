<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_diagnosis".
 *
 * @property integer                $id
 * @property integer                $parent
 * @property string                 $code
 * @property string                 $name
 *
 * @property ConcomitantDiagnosis[] $concomitantDiagnoses
 * @property DiagnosisPreliminary[] $diagnosisPreliminaries
 * @property PostponedDisease[]     $postponedDiseases
 */
class BaseDiagnosis extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_diagnosis';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['id'], 'required'],
				[['id', 'parent'], 'integer'],
				[['code'], 'string', 'max'=>10],
				[['name'], 'string', 'max'=>419],
				[['id'], 'unique'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'id'    =>'ID',
				'parent'=>'Parent',
				'code'  =>'Code',
				'name'  =>'Name',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getConcomitantDiagnoses()
	{
		return $this->hasMany(ConcomitantDiagnosis::className(), ['diagnosis_base_id'=>'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDiagnosisPreliminaries()
	{
		return $this->hasMany(DiagnosisPreliminary::className(), ['diagnosis_base_id'=>'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPostponedDiseases()
	{
		return $this->hasMany(PostponedDisease::className(), ['diagnosis_base_id'=>'id']);
	}
}
