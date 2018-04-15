<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_kidneyarea".
 *
 * @property integer      $id
 * @property string       $name
 *
 * @property Kidneyarea[] $kidneyareas
 */
class BaseKidneyarea extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_kidneyarea';
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
	public function getKidneyareas()
	{
		return $this->hasMany(Kidneyarea::className(), ['kidneyarea_base_id'=>'id']);
	}
}
