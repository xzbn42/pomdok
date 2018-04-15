<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hearttones".
 *
 * @property integer       $heartone_id
 * @property integer       $hearttone_base_id
 *
 * @property BaseHearttone $hearttoneBase
 * @property History[]     $histories
 * @property Heartscopes[] $heartscopes
 */
class Hearttones extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'hearttones';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['heartone_id', 'hearttone_base_id'], 'required'],
				[['heartone_id', 'hearttone_base_id'], 'integer'],
				[
						['hearttone_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseHearttone::className(),
						'targetAttribute'=>['hearttone_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'heartone_id'      =>'Heartone ID',
				'hearttone_base_id'=>'Hearttone Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHearttoneBase()
	{
		return $this->hasOne(BaseHearttone::className(), ['id'=>'hearttone_base_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHistories()
	{
		return $this->hasMany(History::className(), ['heartones'=>'heartone_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHeartscopes()
	{
		return $this->hasMany(Heartscopes::className(), ['heartscope_id'=>'heartscopes'])->viaTable('history', ['heartones'=>'heartone_id']);
	}
}
