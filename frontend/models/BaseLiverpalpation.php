<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_liver_palpation".
 *
 * @property integer         $id
 * @property string          $name
 *
 * @property LiverPapation[] $liverPapations
 */
class BaseLiverpalpation extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_liver_palpation';
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
	public function getLiverPapations()
	{
		return $this->hasMany(LiverPapation::className(), ['liver_papation_base_id'=>'id']);
	}
}
