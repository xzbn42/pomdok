<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_gallbladder".
 *
 * @property integer       $id
 * @property string        $name
 *
 * @property Gallbladder[] $gallbladders
 */
class BaseGallbladder extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_gallbladder';
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
	public function getGallbladders()
	{
		return $this->hasMany(Gallbladder::className(), ['gallbladder_base_id'=>'id']);
	}
}
