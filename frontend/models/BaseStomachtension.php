<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_stomach_tension".
 *
 * @property integer          $id
 * @property string           $name
 *
 * @property StomachTension[] $stomachTensions
 */
class BaseStomachtension extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_stomach_tension';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['name'], 'required'],
				[['name'], 'string', 'max'=>250],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'id'  =>'ID',
				'name'=>'Name',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStomachTensions()
	{
		return $this->hasMany(StomachTension::className(), ['stomach_tension_base_id'=>'id']);
	}
}
