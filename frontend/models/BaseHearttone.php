<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_hearttone".
 *
 * @property integer      $id
 * @property string       $name
 *
 * @property Hearttones[] $hearttones
 */
class BaseHearttone extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_hearttone';
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
	public function getHearttones()
	{
		return $this->hasMany(Hearttones::className(), ['hearttone_base_id'=>'id']);
	}
}
