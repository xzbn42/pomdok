<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_intestine_palpation".
 *
 * @property integer   $id
 * @property string    $name
 *
 * @property History[] $histories
 */
class BaseIntestinePalpation extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_intestine_palpation';
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
	public function getHistories()
	{
		return $this->hasMany(History::className(), ['intestine_palpation'=>'id']);
	}
}
