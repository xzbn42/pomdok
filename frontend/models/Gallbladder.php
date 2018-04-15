<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "gallbladder".
 *
 * @property integer         $gallbladder_id
 * @property integer         $gallbladder_base_id
 *
 * @property BaseGallbladder $gallbladderBase
 * @property History[]       $histories
 */
class Gallbladder extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'gallbladder';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['gallbladder_id', 'gallbladder_base_id'], 'required'],
				[['gallbladder_id', 'gallbladder_base_id'], 'integer'],
				[
						['gallbladder_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseGallbladder::className(),
						'targetAttribute'=>['gallbladder_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'gallbladder_id'     =>'Gallbladder ID',
				'gallbladder_base_id'=>'Gallbladder Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGallbladderBase()
	{
		return $this->hasOne(BaseGallbladder::className(), ['id'=>'gallbladder_base_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHistories()
	{
		return $this->hasMany(History::className(), ['gallbladder'=>'gallbladder_id']);
	}
}
