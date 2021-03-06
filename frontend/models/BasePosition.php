<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_position".
 *
 * @property integer $id
 * @property string  $name
 */
class BasePosition extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_position';
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
}
