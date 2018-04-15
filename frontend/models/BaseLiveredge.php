<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_liver_edge".
 *
 * @property integer $id
 * @property string  $name
 */
class BaseLiveredge extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_liver_edge';
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
