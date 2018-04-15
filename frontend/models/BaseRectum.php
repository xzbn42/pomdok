<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_rectum".
 *
 * @property integer  $id
 * @property string   $name
 *
 * @property Rectum[] $recta
 */
class BaseRectum extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_rectum';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['name'], 'required'],
				[['name'], 'string', 'max'=>200],
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
	public function getRecta()
	{
		return $this->hasMany(Rectum::className(), ['rectum_base_id'=>'id']);
	}
}
