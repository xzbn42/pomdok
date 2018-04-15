<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_tongue".
 *
 * @property integer  $id
 * @property string   $name
 *
 * @property Tongue[] $tongues
 */
class BaseTongue extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_tongue';
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
	public function getTongues()
	{
		return $this->hasMany(Tongue::className(), ['tongue_base_id'=>'id']);
	}
}
