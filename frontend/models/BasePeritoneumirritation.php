<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_peritoneum_irritation".
 *
 * @property integer $id
 * @property string  $name
 */
class BasePeritoneumirritation extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_peritoneum_irritation';
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
}
