<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_piss".
 *
 * @property integer $id
 * @property string  $name
 *
 * @property Piss[]  $pisses
 */
class BasePiss extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_piss';
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
	public function getPisses()
	{
		return $this->hasMany(Piss::className(), ['piss_base_id'=>'id']);
	}
}
